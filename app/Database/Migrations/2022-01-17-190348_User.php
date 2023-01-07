<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type' => 'INT',
                'constraint' => '11'
            ],
            'email_user' => [
                'type' => 'VARCHAR',
                'constraint' => '250'
            ],
            'password_user' => [
                'type' => 'VARCHAR',
                'constraint' => '250'
            ]
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        //
    }
}
