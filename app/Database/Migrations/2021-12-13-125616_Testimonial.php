<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Testimonial extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_testimonial' => [
                'type' => 'INT',
                'constraint' => '11',
                'auto_increment' => true,
            ],
            'nama_testimonial' => [
                'type' => 'VARCHAR',
                'constraint' => '250'
            ],
            'keterangan_testimonial' => [
                'type' => 'TEXT'
            ],
            'gambar_testimonial' => [
                'type' => 'VARCHAR',
                'constraint' => '250'
            ]
            

        ]);
        $this->forge->addKey('id_testimonial', true);
        $this->forge->createTable('testimonial');
    }

    public function down()
    {
        $this->forge->dropTable('testimonial');
    }
}
