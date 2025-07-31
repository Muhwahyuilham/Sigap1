<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPriorityAndDeadlineToOrders extends Migration
{
    public function up()
    {
    $this->forge->addColumn('tb_order', [
        'priority' => [
            'type' => 'INT',
            'constraint' => 3,
            'default' => 1,
            'after' => 'file_path'
        ],
        'deadline' => [
            'type' => 'DATE',
            'null' => true,
            'after' => 'priority'
        ],
    ]);
    }

    public function down()
    {
    $this->forge->dropColumn('tb_order', ['priority', 'deadline']);
    }

}
