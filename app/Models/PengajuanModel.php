<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanModel extends Model
{
    protected $table      = 'jenis'; // Tabel 'jenis' yang sudah ada
    protected $primaryKey = 'id';
    protected $allowedFields = ['jenis_name', 'judul', 'description']; // Kolom yang diizinkan
    protected $useTimestamps = true;  // Menambahkan kolom created_at dan updated_at
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Menambahkan validasi input
    protected $validationRules = [
        'jenis_name' => 'required|in_list[Permohonan,Gangguan]',
        'judul'      => 'required|min_length[3]',
    ];

    // Pesan validasi
    protected $validationMessages = [
        'jenis_name' => [
            'required' => 'Jenis pengajuan harus dipilih.',
            'in_list'  => 'Jenis pengajuan harus berupa Permohonan atau Gangguan.'
        ],
        'judul' => [
            'required'    => 'Judul pengajuan harus diisi.',
            'min_length'  => 'Judul pengajuan minimal 3 karakter.'
        ]
    ];
}
