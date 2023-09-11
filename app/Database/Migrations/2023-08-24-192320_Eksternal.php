<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Eksternal extends Migration
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
            'nama_eksternal' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'link_eksternal' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'default' => 'default.jpg',
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('eksternal');
    }

    public function down()
    {
        $this->forge->dropTable('eksternal');
    }
}
