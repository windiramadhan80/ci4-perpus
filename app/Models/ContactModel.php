<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table      = 'contact';
    protected $primaryKey     = 'id';
    protected $allowedFields  = ['judul', 'icon',];
    protected $useTimestamps   = true;
}
