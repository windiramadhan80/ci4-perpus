<?php

namespace App\Models;

use CodeIgniter\Model;

class EbookModel extends Model
{
    protected $table      = 'ebook';
    protected $primaryKey     = 'id';
    protected $allowedFields  = ['nama_ebook', 'link_ebook', 'image',];
    protected $useTimestamps   = true;
}
