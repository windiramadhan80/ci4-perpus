<?php

namespace App\Models;

use CodeIgniter\Model;

class EresourceModel extends Model
{
    protected $table      = 'e_resource';
    protected $primaryKey     = 'id';
    protected $allowedFields  = ['nama_eresource', 'link_eresource', 'image',];
    protected $useTimestamps   = true;
}
