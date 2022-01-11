<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Profil extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_profil' => [
                'type' => 'INT',
                'constraint' => '1',
            ],
            'nama_profil' => [
                'type' => 'VARCHAR',
                'constraint' => '250'
            ],
            'singkatan_profil' => [
                'type' => 'VARCHAR',
                'constraint' => '250'
            ],
            'tagline_profil' => [
                'type' => 'VARCHAR',
                'constraint' => '250'
            ],
            'web_profil' => [
                'type' => 'VARCHAR',
                'constraint' => '250'
            ],
            'email_profil' => [
                'type' => 'VARCHAR',
                'constraint' => '250'
            ],
            'telp_profil' => [
                'type' => 'VARCHAR',
                'constraint' => '13'
            ],
            'fax_profil' => [
                'type' => 'VARCHAR',
                'constraint' => '20'
            ],
            'fb_profil' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'twit_profil' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'ig_profil' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'isi_profil' => [
                'type' => 'TEXT'
            ],
            'alamat_profil' => [
                'type' => 'TEXT'
            ],
            'map_profil' => [
                'type' => 'TEXT'
            ]

        ]);
        $this->forge->addKey('id_profil', true);
        $this->forge->createTable('profil');
    }

    public function down()
    {
        $this->forge->dropTable('profil');
    }
}
