<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'no_order'      => 'ORD001',
                'judul_order'   => 'Pengajuan Layanan A',
                'jenis'         => 'Layanan Permohonan',
                'kategori'      => 'Kategori A',
                'detail'        => 'Detail pengajuan layanan A',
                'status'        => 'pending',
                'email'         => 'user1@example.com',
                'file_name'     => 'file1.pdf',
                'file_type'     => 'application/pdf',
                'file_size'     => 12345,
                'file_path'     => 'uploads/file1.pdf',
                'tanggal_input' => date('Y-m-d H:i:s'),
                'tanggal_ubah'  => date('Y-m-d H:i:s'),
            ],
            [
                'no_order'      => 'ORD002',
                'judul_order'   => 'Pengajuan Layanan B',
                'jenis'         => 'Layanan Perpanjangan',
                'kategori'      => 'Kategori B',
                'detail'        => 'Detail pengajuan layanan B',
                'status'        => 'process',
                'email'         => 'user2@example.com',
                'file_name'     => 'file2.pdf',
                'file_type'     => 'application/pdf',
                'file_size'     => 23456,
                'file_path'     => 'uploads/file2.pdf',
                'tanggal_input' => date('Y-m-d H:i:s'),
                'tanggal_ubah'  => date('Y-m-d H:i:s'),
            ],
        ];

        // Using Query Builder
        $this->db->table('tb_order')->insertBatch($data);
    }
} 