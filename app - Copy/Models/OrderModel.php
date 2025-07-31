<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table            = 'tb_order';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields = [
        'no_order', 
        'username',
        'judul_order', 
        'jenis', 
        'kategori', 
        'detail',
        'status', 
        'email', 
        'file_name', 
        'file_type', 
        'file_size', 
        'file_path', 
        'tanggal_input', 
        'tanggal_ubah'
    ]; 

    public function getOrdersByUsername($username)
    {
        return $this->select('orders.*, users.username')
                    ->join('users', 'users.username = orders.username') // Hubungkan tabel
                    ->where('orders.username', $username)
                    ->findAll();
    }

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tanggal_input';
    protected $updatedField  = 'tanggal_ubah';
   

   
}
