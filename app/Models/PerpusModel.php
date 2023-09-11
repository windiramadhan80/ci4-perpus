<?php

namespace App\Models;

use CodeIgniter\Model;

class PerpusModel extends Model
{
    protected $table      = 'perpus';
    protected $primaryKey     = 'id';
    protected $allowedFields  = ['judul', 'link',];
    protected $useTimestamps   = true;
}
