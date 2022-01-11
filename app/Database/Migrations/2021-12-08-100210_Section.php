<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Section extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_section' => [
                'type' => 'INT',
                'constraint' => '5',
                'auto_increment' => true
            ],
            'layout' => [
                'type' => 'VARCHAR',
                'constraint' => '10'
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'url' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'tgl_publish' => [
                'type' => 'DATE'
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'isi_konten' => [
                'type' => 'TEXT'
            ]
        ]);
        $this->forge->addKey('id_section', true);
        $this->forge->createTable('section');
    }

    public function down()
    {
        $this->forge->dropTable('section');
    }
}
