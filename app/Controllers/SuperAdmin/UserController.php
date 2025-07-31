<?php

namespace App\Controllers\SuperAdmin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\LogModel;

class UserController extends BaseController
{
    protected $userModel;
    protected $logModel;

    public function __construct()
    {
        $this->userModel = new UserModel();  // Model untuk user
        $this->logModel = new LogModel();    // Model untuk log aktivitas
    }

    // Menampilkan daftar semua user
    public function index()
    {
        $users = $this->userModel->findAll();  // Ambil semua data user
        return view('superadmin/user-management/index', ['users' => $users]);
    }

    // Menampilkan form tambah user
    public function create()
    {
        return view('superadmin/user-management/create');
    }

    // Menyimpan data user baru ke database
public function store()
{
    // Validasi data formulir
    if (!$this->validate([
        'nama' => 'required|min_length[3]',
        'username' => 'required|min_length[3]',
        'email' => 'required|valid_email',
        'role' => 'required|in_list[user,admin,superadmin,kasusbag]', // Pastikan hanya role yang valid
        'password' => 'required|min_length[6]',
    ])) {
        return redirect()->to('superadmin/user/create')->withInput()->with('error', 'Form data tidak valid!');
    }

    // Ambil data dari formulir
    $data = [
        'nama' => $this->request->getPost('nama'),
        'username' => $this->request->getPost('username'),
        'email' => $this->request->getPost('email'),
        'role' => $this->request->getPost('role'),
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'usergroup_id' => 1, // Jika ingin memberikan usergroup_id default
        'created_at' => date('Y-m-d H:i:s'),  // Menambahkan waktu saat dibuat
        'updated_at' => date('Y-m-d H:i:s'),  // Menambahkan waktu saat diperbarui
    ];

    // Simpan data ke database
    if ($this->userModel->insert($data)) {
        session()->setFlashdata('success', 'User berhasil ditambahkan!');
        return redirect()->to('/superadmin/user-management/index');
    } else {
        session()->setFlashdata('error', 'Gagal menambahkan user!');
        return redirect()->to('/superadmin/user-management/create');
    }
}


    // Menampilkan form edit user
    public function edit($id)
    {
        $user = $this->userModel->find($id);  // Ambil data user berdasarkan ID
        if (!$user) {
            return redirect()->to('/superadmin/user-management')->with('error', 'User tidak ditemukan');
        }
        return view('superadmin/user-management/edit', ['user' => $user]);
    }

    // Memperbarui data user
    public function update($id)
    {
        $data = $this->request->getPost();

        // Validasi inputan
        if (!$this->validate([
            'nama' => 'required',
            'username' => 'required|alpha_numeric|min_length[3]',
            'email' => 'required|valid_email',
            'role' => 'required',
            'password' => 'required|min_length[6]',
        ])) {
            return redirect()->back()->withInput()->with('error', 'Validation failed');
        }

        // Update data user
        $this->userModel->update($id, $data);

        // Log aktivitas: User memperbarui data user
        $this->logModel->save([
            'user_id' => session()->get('user_id'),
            'action' => 'Updated user ' . $data['nama'],
            'timestamp' => date('Y-m-d H:i:s')
        ]);

        // Redirect ke halaman user-management setelah berhasil
        return redirect()->to('/superadmin/user-management')->with('success', 'User successfully updated');
    }

    // Menampilkan log aktivitas user
    public function logs()
    {
        // Ambil data log aktivitas
        $logs = $this->logModel->findAll();
        return view('superadmin/user-management/user_logs', ['logs' => $logs]);
    }
}
