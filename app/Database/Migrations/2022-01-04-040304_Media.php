<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Media extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_media' => [
                'type' => 'INT',
                'constraint' => '11',
                'auto_increment' => true,
            ],
            'judul_media' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'deskripsi_media' => [
                'type' => 'TEXT'
            ],
            'file_media' => [
                'type' => 'VARCHAR',
                'constraint' => '250'
            ]

        ]);
        $this->forge->addKey('id_media', true);
        $this->forge->createTable('media');
    }

    public function down()
    {
        $this->forge->dropTable('media');
    }
}
