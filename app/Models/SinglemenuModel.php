<?php

namespace App\Models;

use CodeIgniter\Model;

class SinglemenuModel extends Model
{
    protected $table      = 'single_menu';
    protected $primaryKey     = 'id';
    protected $allowedFields  = ['single_menu', 'slug', 'body'];
}
