<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserGroupsTable extends Migration
{
    public function up()
    {
        // Membuat tabel user_groups
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'group_name'  => ['type' => 'VARCHAR', 'constraint' => '100'],
            'description' => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('user_groups');
    }

    public function down()
    {
        // Menghapus tabel user_groups
        $this->forge->dropTable('user_groups');
    }
}
