<?php

namespace App\Models;

use CodeIgniter\Model;

class FaqModel extends Model
{
    // protected $DBGroup              = 'default';
    protected $table                = 'faq';
    protected $primaryKey           = 'id_faq';
    protected $returnType           = 'object';
    protected $allowedFields        = [
        'judul_faq',
        'deskripsi_faq'
    ];
}
