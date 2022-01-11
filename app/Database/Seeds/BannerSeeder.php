<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BannerSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id_banner' => '1',
            'img_banner' => '',
            'keterangan_banner' => ''
        ];
        $this->db->table('banner')->insert($data);
    }
}
