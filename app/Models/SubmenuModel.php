<?php

namespace App\Models;

use CodeIgniter\Model;

class SubmenuModel extends Model
{
    protected $table      = 'submenu';
    protected $primaryKey     = 'id';
    protected $allowedFields  = ['submenu', 'slug', 'menu_id', 'body'];
}
