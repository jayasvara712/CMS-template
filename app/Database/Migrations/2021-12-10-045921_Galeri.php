<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Galeri extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_galeri' => [
                'type' => 'INT',
                'constraint' => '11',
                'auto_increment' => true,
            ],
            'judul_galeri' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'deskripsi_galeri' => [
                'type' => 'TEXT'
            ],
            'gambar_galeri' => [
                'type' => 'VARCHAR',
                'constraint' => '250'
            ]

        ]);
        $this->forge->addKey('id_galeri', true);
        $this->forge->createTable('galeri');
    }

    public function down()
    {
        $this->forge->dropTable('galeri');
    }
}
