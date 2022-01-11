<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProfilSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id_profil' => '1',
            'nama_profil' => '',
            'singkatan_profil' => '',
            'tagline_profil' => '',
            'web_profil' => '',
            'email_profil' => '',
            'telp_profil' => '',
            'fax_profil' => '',
            'fb_profil' => '',
            'twit_profil' => '',
            'ig_profil' => '',
            'isi_profil' => '',
            'alamat_profil' => '',
            'map_profil' => '',
        ];
        $this->db->table('profil')->insert($data);
    }
}
