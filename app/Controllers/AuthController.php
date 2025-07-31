<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LogModel;  // Import LogModel untuk menyimpan log
use CodeIgniter\Controller;

class AuthController extends Controller
{
    protected $userModel;
    protected $logModel;

    public function __construct()
    {
        $this->userModel = new UserModel();  // Initialize the UserModel
        $this->logModel = new LogModel();    // Initialize the LogModel
    }

    public function login()
    {
        return view('auth/login'); // Load the login view
    }

    public function attemptLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Attempt to retrieve the user by username
        $user = $this->userModel->where('username', $username)->first();
        
        // Check if user exists
        if (!$user) {
            session()->setFlashdata('error', 'User not found.');
            return redirect()->back()->withInput();
        }
        
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Set session data
            session()->set([
                'isLoggedIn' => true,
                'username' => $username,
                'email' => $user['email'],  // Store email in session for reference
                'role' => $user['role']
            ]);

            // Menambahkan log aktivitas setelah login berhasil
            $this->logModel->save([
                'user_id' => $user['id'],         // Mengambil user_id dari user yang login
                'action' => 'User logged in',     // Deskripsi aktivitas login
                'timestamp' => date('Y-m-d H:i:s') // Waktu login
            ]);

            // Debug: Check the user's role before redirecting
            switch (strtolower($user['role'])) {
                case 'admin':
                    return redirect()->to(base_url('admin/home'));
                case 'superadmin':
                    return redirect()->to(base_url('superadmin/home'));
                case 'user':
                    return redirect()->to(base_url('user/dashboard'));
                case 'kasusbag':  // Adding the case for `kasusbag`
                    return redirect()->to(base_url('kasusbag/home'));
                default:
                    session()->setFlashdata('error', 'Invalid role: ' . $user['role']);
                    return redirect()->back()->withInput();
            }
        } else {
            session()->setFlashdata('error', 'Password is incorrect.');
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        session()->destroy(); // Clear the session
        return redirect()->to('/login'); // Redirect to login page after logout
    }
}
