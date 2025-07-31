<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'nama', 'role', 'email', 'no_wa', 'group_id']; // Hapus 'status'
    protected $useTimestamps = true;

    public function getUserGroup($group_id)
    {
        // Ambil nama grup berdasarkan group_id
        return $this->db->table('user_groups')->where('id', $group_id)->get()->getRow();
    }
}
