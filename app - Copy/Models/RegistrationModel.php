<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistrationModel extends Model
{
    protected $table = 'users'; // Nama tabel di database
    protected $primaryKey = 'id'; // Kolom primary key
    protected $allowedFields = ['nama', 'username', 'email', 'password', 'role', 'no_wa', 'created_at', 'updated_at'];
    protected $returnType = 'array'; // Mengembalikan hasil sebagai array
    protected $useTimestamps = true; // Aktifkan timestamp otomatis
    protected $createdField = 'created_at'; // Kolom created_at
    protected $updatedField = 'updated_at'; // Kolom updated_at

    /**
     * Buat pengguna baru.
     *
     * @param array $data Data yang berisi nama, username, email, password, role, no_wa
     * @return int|bool ID pengguna yang baru jika berhasil, false jika gagal
     */
    public function createUser(array $data)
    {
        // Hash password sebelum disimpan
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }

        return $this->insert($data); // Insert data ke database
    }

    /**
     * Periksa apakah username sudah digunakan.
     *
     * @param string $username Username yang akan diperiksa
     * @return bool True jika ada, false jika tidak
     */
    public function usernameExists(string $username): bool
    {
        return $this->where('username', $username)->first() !== null;
    }

    /**
     * Periksa apakah email sudah digunakan.
     *
     * @param string $email Email yang akan diperiksa
     * @return bool True jika ada, false jika tidak
     */
    public function emailExists(string $email): bool
    {
        return $this->where('email', $email)->first() !== null;
    }

    /**
     * Ambil pengguna berdasarkan email atau username.
     *
     * @param string $username
     * @return array|null Data pengguna atau null jika tidak ditemukan
     */
    public function getUserByUsername(string $username): ?array
    {
        return $this->where('username', $username)->first();
    }
}
