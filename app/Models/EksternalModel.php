<?php

namespace App\Models;

use CodeIgniter\Model;

class EksternalModel extends Model
{
    protected $table      = 'eksternal';
    protected $primaryKey     = 'id';
    protected $allowedFields  = ['nama_eksternal', 'link_eksternal', 'image',];
    protected $useTimestamps   = true;
}
