<?php

namespace App\Models;

use CodeIgniter\Model;

class RepositoryModel extends Model
{
    protected $table      = 'repository';
    protected $primaryKey     = 'id';
    protected $allowedFields  = ['link_repository'];
}
