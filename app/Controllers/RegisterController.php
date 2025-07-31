<?php

namespace App\Controllers;

use App\Models\RegistrationModel;

class RegisterController extends BaseController
{
    protected $registrationModel;

    public function __construct()
    {
        // Inisialisasi model registrasi
        $this->registrationModel = new RegistrationModel();
    }

    /**
     * Menampilkan halaman registrasi.
     */
    public function register()
    {
        return view('auth/register'); // Menampilkan form registrasi
    }

    /**
     * Proses registrasi pengguna.
     */
    public function attemptRegister()
    {
        // Ambil data dari form
        $nama = $this->request->getPost('nama');
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');
        $role = $this->request->getPost('role'); // Admin/user/superadmin
        $no_wa = $this->request->getPost('no_wa');

        // Validasi: Password dan Confirm Password cocok
        if ($password !== $confirmPassword) {
            return redirect()->back()->with('error', 'Password dan Konfirmasi Password tidak cocok.')
                                   ->withInput(); // Menyertakan input pengguna kembali
        }

        // Validasi: Nomor WhatsApp harus numerik dan panjangnya valid
        if (!is_numeric($no_wa) || strlen($no_wa) < 10 || strlen($no_wa) > 15) {
            return redirect()->back()->with('error', 'Nomor WhatsApp tidak valid.')
                                   ->withInput(); // Menyertakan input pengguna kembali
        }

        // Validasi: Username tidak boleh duplikat
        if ($this->registrationModel->usernameExists($username)) {
            return redirect()->back()->with('error', 'Username sudah terdaftar.')
                                   ->withInput(); // Menyertakan input pengguna kembali
        }

        // Validasi: Email tidak boleh duplikat
        if ($this->registrationModel->emailExists($email)) {
            return redirect()->back()->with('error', 'Email sudah terdaftar.')
                                   ->withInput(); // Menyertakan input pengguna kembali
        }

        // Hashing password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Siapkan data untuk disimpan
        $data = [
            'nama' => $nama,
            'username' => $username,
            'email' => $email,
            'password' => $hashedPassword, // Password yang sudah di-hash
            'role' => $role,
            'no_wa' => $no_wa,
        ];

        // Simpan data pengguna ke database
        if ($this->registrationModel->createUser($data)) {
            return redirect()->to('/login')->with('success', 'Registrasi berhasil. Silakan login.');
        }

        // Jika gagal menyimpan
        return redirect()->back()->with('error', 'Registrasi gagal. Silakan coba lagi.')->withInput(); // Menyertakan input pengguna kembali
    }
}
