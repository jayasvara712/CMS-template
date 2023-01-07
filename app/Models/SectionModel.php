<?php

namespace App\Models;

use CodeIgniter\Model;

class SectionModel extends Model
{
    // protected $DBGroup              = 'default';
    protected $table                = 'section';
    protected $primaryKey           = 'id_section';
    protected $returnType           = 'object';
    protected $allowedFields        = [
        'layout',
        'judul',
        'url',
        'tgl_publish',
        'status',
        'gambar',
        'isi_konten'
    ];
    protected $attributes           = [
        'gambar_galeri_section' => null
    ];

    public function count_all()
    {
        $builder = $this->db->table($this->table);
        $query = $builder->countAll();
        return $query;
    }
}
