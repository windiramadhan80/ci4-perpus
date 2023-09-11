<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table      = 'gallery';
    protected $primaryKey     = 'id';
    protected $allowedFields  = ['nama_gallery', 'image',];
    protected $useTimestamps   = true;
}
