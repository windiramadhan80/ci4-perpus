<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Buku extends Migration
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
            'nama_buku' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'facebook' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'twitter' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'instagram' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true
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
        $this->forge->createTable('buku');
    }

    public function down()
    {
        $this->forge->dropTable('buku');
    }
}
