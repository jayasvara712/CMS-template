<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Banner extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_banner' => [
                'type' => 'INT',
                'constraint' => '11',
                'auto_increment' => true
            ],
            'img_banner' => [
                'type' => 'VARCHAR',
                'constraint' => '250'
            ],
            'keterangan_banner' => [
                'type' => 'TEXT'
            ]
        ]);
        $this->forge->addKey('id_banner', true);
        $this->forge->createTable('banner');
    }

    public function down()
    {
        $this->forge->dropTable('banner');
    }
}
