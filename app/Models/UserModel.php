<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';  // Nama tabel yang digunakan
    protected $primaryKey = 'id';  // Kolom primary key
    protected $allowedFields = ['username', 'password'];  // Kolom yang boleh diubah

    // Fungsi untuk mendapatkan user berdasarkan username
    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
    public function saveUser($data)
{
    // Hash password sebelum disimpan ke database
    $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
    return $this->insert($data);
}

}