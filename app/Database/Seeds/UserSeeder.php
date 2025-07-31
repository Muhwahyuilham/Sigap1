<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Mengambil ID role 'kasusbag'
        $roleId = $this->db->table('user_groups')->select('id')->where('group_name', 'kasusbag')->get()->getRow()->id;

        // Menambahkan pengguna kasusbag
        $data = [
            [
                'nama'       => 'kasusbag 1',
                'username'   => 'kasusbag_user',
                'password'   => password_hash('kasusbag123', PASSWORD_DEFAULT), // Menggunakan PASSWORD_DEFAULT untuk keamanan
                'email'      => 'kasusbag@example.com',
                'usergroup_id' => $roleId  // Menggunakan ID dari role 'kasusbag'
            ]
        ];

        // Insert data pengguna ke tabel users
        $this->db->table('users')->insertBatch($data);
    }
}
