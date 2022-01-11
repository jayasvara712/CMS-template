<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Price extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_price' => [
                'type' => 'INT',
                'constraint' => '11',
                'auto_increment' => true,
            ],
            'judul_price' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'deskripsi_price' => [
                'type' => 'TEXT'
            ],
            'gambar_price' => [
                'type' => 'VARCHAR',
                'constraint' => '250'
            ],
            'harga' => [
                'type' => 'int',
                'constraint' => '100'
            ],
            'harga_diskon' => [
                'type' => 'int',
                'constraint' => '100'
            ]


        ]);
        $this->forge->addKey('id_price', true);
        $this->forge->createTable('price');
    }

    public function down()
    {
        $this->forge->dropTable('price');
    }
}
