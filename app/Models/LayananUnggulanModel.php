<?php

namespace App\Models;

use CodeIgniter\Model;

class LayananUnggulanModel extends Model
{
    protected $table      = 'layanan_unggulan';
    protected $primaryKey     = 'id';
    protected $allowedFields  = ['nama_layanan', 'link_layanan', 'image',];
    protected $useTimestamps   = true;
}
