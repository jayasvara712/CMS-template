<?php

namespace App\Models;

use CodeIgniter\Model;

class MediaModel extends Model
{
    // protected $DBGroup              = 'default';
    protected $table                = 'media';
    protected $primaryKey           = 'id_media';
    protected $returnType           = 'object';
    protected $allowedFields        = [
        'judul_media',
        'deskripsi_media',
        'file_media'
    ];
}
