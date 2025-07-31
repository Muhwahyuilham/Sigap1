<?php

namespace App\Models;

use CodeIgniter\Model;

class LogModel extends Model
{
    protected $table = 'user_logs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'action', 'timestamp'];
}

