<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'users'; // Name of the table in your database
    protected $primaryKey = 'id'; // Primary key of the table
    protected $allowedFields = ['username', 'email', 'password', 'role', 'nama', 'no_wa', 'nama_satker']; // Fields that can be inserted/updated
    protected $returnType = 'array'; // Return type of the model

    // Method to find a user by username
    public function findByUsername($username)
    {
        return $this->where('username', $username)->first(); // Returns the first user found or null
    }

    // Method to create a new user
    public function createUser ($data)
    {
        // Hash the password before saving
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $this->insert($data); // Inserts the user data into the database
    }

    // Method to update user information
    public function updateUser ($id, $data)
    {
        // If password is being updated, hash it
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        return $this->update($id, $data); // Updates the user data in the database
    }

    // Method to delete a user
    public function deleteUser ($id)
    {
        return $this->delete($id); // Deletes the user from the database
    }
}