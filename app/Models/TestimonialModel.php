<?php

namespace App\Models;

use CodeIgniter\Model;

class TestimonialModel extends Model
{
    // protected $DBGroup              = 'default';
    protected $table                = 'testimonial';
    protected $primaryKey           = 'id_testimonial';
    protected $returnType           = 'object';
    protected $allowedFields        = [
        'nama_testimonial',
        'keterangan_testimonial',
        'gambar_testimonial'
    ];
}
