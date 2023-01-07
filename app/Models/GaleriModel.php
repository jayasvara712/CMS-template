<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriModel extends Model
{
    // protected $DBGroup              = 'default';
    protected $table                = 'galeri';
    protected $primaryKey           = 'id_galeri';
    protected $returnType           = 'object';
    protected $allowedFields        = [
        'judul_galeri',
        'deskripsi_galeri',
        'gambar_galeri'
    ];
    protected $attributes           = [
        'gambar_media_galeri' => null
    ];

    public function count_all()
    {
        $builder = $this->db->table($this->table);
        $query = $builder->countAll();
        return $query;
    }
}
