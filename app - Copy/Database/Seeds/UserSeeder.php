<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'     => 'superadmin user', 
                'username' => 'superadmin',
                'password' => password_hash('superadmin123', PASSWORD_DEFAULT),
                'role'     => 'super admin',
                'email'    => 'superadmin@gmail.com',
                'no_wa'    => '081354969042',
                
            ],
            [
                'nama'     => 'pengguna',
                'username' => 'user',
                'password' => password_hash('user123', PASSWORD_DEFAULT),
                'role'     => 'user',
                'email'    => 'user@gmail.com',
                'no_wa'    => '081354969043',
                
            ],
        ];

        // Using Query Builder
        $this->db->table('users')->insertBatch($data);
    }
} 