<?php

namespace App\Controllers\SuperAdmin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class ProfileController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function profile()
    {
        $username = session()->get('username'); // Ambil username dari sesi

        // Debugging: Log username
        log_message('debug', 'Username: ' . $username);

        if (!$username) {
            return redirect()->to('/login')->with('errors', 'Session expired. Please log in again.');
        }

        $data['user'] = $this->userModel->where('username', $username)->first();

        if (!$data['user']) {
            return redirect()->to('/login')->with('errors', 'User not found.');
        }

        return view('superadmin/profile/index', $data);
    }

    public function updateProfile()
    {
        $username = session()->get('username'); // Ambil username dari sesi

        // Debugging: Log username
        log_message('debug', 'Username: ' . $username);

        if (!$username) {
            return redirect()->back()->with('errors', 'Username not found in session.');
        }

        $validation = \Config\Services::validation();

        $validation->setRules([
            'nama' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|max_length[255]',
            'username' => 'required|min_length[3]|max_length[255]',
            'password' => 'required|min_length[6]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $this->userModel->where('username', $username)->set([
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ])->update();

        return redirect()->to('/superadmin/profile')->with('success', 'Profile updated successfully.');
    }
}
