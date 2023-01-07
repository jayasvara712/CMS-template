<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id_user' => 1,
            'email_user' => 'projasa@gmail.com',
            'password_user' => password_hash('Admin123', PASSWORD_BCRYPT),
        ];
        $this->db->table('user')->insert($data);
    }
}
