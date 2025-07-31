<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJenisTable extends Migration
{
    public function up()
    {
        // Membuat tabel jenis
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'jenis_name'  => ['type' => 'VARCHAR', 'constraint' => '100'],
            'description' => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('jenis');
    }

    public function down()
    {
        // Menghapus tabel jenis
        $this->forge->dropTable('jenis');
    }
}
