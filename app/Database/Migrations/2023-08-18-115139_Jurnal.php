<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jurnal extends Migration
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
            'nama_jurnal' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'link_jurnal' => [
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
        $this->forge->createTable('jurnal');
    }

    public function down()
    {
        $this->forge->dropTable('jurnal');
    }
}
