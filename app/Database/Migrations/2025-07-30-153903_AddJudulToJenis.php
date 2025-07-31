<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddJudulToJenis extends Migration
{
    public function up()
    {
        // Menambahkan kolom 'judul' pada tabel 'jenis'
        $this->forge->addColumn('jenis', [
            'judul' => ['type' => 'TEXT', 'null' => true],  // Menambahkan kolom judul
        ]);
    }

    public function down()
    {
        // Menghapus kolom 'judul' jika rollback
        $this->forge->dropColumn('jenis', 'judul');
    }
}
