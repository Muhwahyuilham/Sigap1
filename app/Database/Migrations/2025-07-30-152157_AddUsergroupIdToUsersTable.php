<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsergroupIdToUsersTable extends Migration
{
    public function up()
    {
        // Menambahkan kolom usergroup_id ke tabel users
        $this->forge->addColumn('users', [
            'usergroup_id' => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'after' => 'role'],
        ]);
        
        // Menambahkan foreign key untuk menghubungkan usergroup_id dengan tabel user_groups
        $this->forge->addForeignKey('usergroup_id', 'user_groups', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        // Menghapus kolom usergroup_id dan relasinya
        $this->forge->dropForeignKey('users', 'users_usergroup_id_foreign');
        $this->forge->dropColumn('users', 'usergroup_id');
    }
}
