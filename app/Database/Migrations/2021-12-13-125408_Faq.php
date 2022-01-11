<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Faq extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_faq' => [
                'type' => 'INT',
                'constraint' => '11',
                'auto_increment' => true,
            ],
            'judul_faq' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'deskripsi_faq' => [
                'type' => 'TEXT'
            ]

        ]);
        $this->forge->addKey('id_faq', true);
        $this->forge->createTable('faq');
    }

    public function down()
    {
        $this->forge->dropTable('faq');
    }
}
