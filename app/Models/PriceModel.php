<?php

namespace App\Models;

use CodeIgniter\Model;

class PriceModel extends Model
{
    // protected $DBGroup              = 'default';
    protected $table                = 'price';
    protected $primaryKey           = 'id_price';
    protected $returnType           = 'object';
    protected $allowedFields        = [
        'judul_price',
        'deskripsi_price',
        'gambar_price',
        'harga',
        'harga_diskon'
    ];
    protected $attributes           = [
        'gambar_media_price' => null
    ];
}
