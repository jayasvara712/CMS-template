<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    // protected $DBGroup              = 'default';
    protected $table                = 'profil';
    protected $primaryKey           = 'id_profil';
    protected $returnType           = 'object';
    protected $allowedFields        = [
        'nama_profil',
        'singkatan_profil',
        'tagline_profil',
        'web_profil',
        'email_profil',
        'telp_profil',
        'fax_profil',
        'fb_profil',
        'twit_profil',
        'ig_profil',
        'isi_profil',
        'alamat_profil',
        'map_profil'
    ];

    function getbyId($id_profil = null)
    {
        $builder = $this->db->table('profil');
        $builder->where('id_profil', $id_profil);
        return $builder->get()->getResult();
    }
}
