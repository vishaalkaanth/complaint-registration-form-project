<?php

namespace App\Models;

use CodeIgniter\Model;

class adminModel extends Model
{
    protected $table = 'admin_credentials';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'email',
        'password',
    ];
}
