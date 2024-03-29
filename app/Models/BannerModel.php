<?php

namespace App\Models;

use CodeIgniter\Model;

class BannerModel extends Model
{
    // protected $DBGroup              = 'default';
    protected $table                = 'banner';
    protected $primaryKey           = 'id_banner';
    protected $returnType           = 'object';
    protected $allowedFields        = [
        'img_banner',
        'keterangan_banner'
    ];
    protected $attributes           = [
        'gambar_media_banner' => null
    ];

    public function count_all()
    {
        $builder = $this->db->table($this->table);
        $query = $builder->countAll();
        return $query;
    }
}
