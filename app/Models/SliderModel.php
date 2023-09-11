<?php

namespace App\Models;

use CodeIgniter\Model;

class SliderModel extends Model
{
    protected $table      = 'slider';
    protected $primaryKey     = 'id';
    protected $allowedFields  = ['judul', 'sub_judul', 'link', 'image',];
    protected $useTimestamps   = true;
}
