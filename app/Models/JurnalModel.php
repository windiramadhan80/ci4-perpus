<?php

namespace App\Models;

use CodeIgniter\Model;

class JurnalModel extends Model
{
    protected $table      = 'jurnal';
    protected $primaryKey     = 'id';
    protected $allowedFields  = ['nama_jurnal', 'link_jurnal', 'image',];
    protected $useTimestamps   = true;
}
