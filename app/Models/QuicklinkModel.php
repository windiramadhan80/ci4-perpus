<?php

namespace App\Models;

use CodeIgniter\Model;

class QuicklinkModel extends Model
{
    protected $table      = 'quicklink';
    protected $primaryKey     = 'id';
    protected $allowedFields  = ['judul', 'link',];
    protected $useTimestamps   = true;
}
