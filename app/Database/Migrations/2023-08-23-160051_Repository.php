<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Repository extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'link_repository' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('repository');
    }

    public function down()
    {
        $this->forge->dropTable('repository');
    }
}
