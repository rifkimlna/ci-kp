<?php
//namespace App\Models;
//
//use CodeIgniter\Model;
//
//class UserModel extends Model
//{
//    protected $table = 'users';
//    protected $primaryKey = 'id';
//    protected $allowedFields = ['nama', 'email', 'password', 'telepon', 'alamat', 'role', 'foto_profil', 'is_verified'];
//    protected $useTimestamps = true;
//
//    // Method untuk hash password
//    public function hashPassword($password)
//    {
//        return password_hash($password, PASSWORD_DEFAULT);
//    }
//
//    // Method untuk verify password
//    public function verifyPassword($password, $hashedPassword)
//    {
//        return password_verify($password, $hashedPassword);
//    }
//
//    // Method untuk mendapatkan user by email
//    public function getUserByEmail($email)
//    {
//        return $this->where('email', $email)->first();
//    }
//
//    // Method untuk cek email exist
//    public function isEmailExist($email)
//    {
//        return $this->where('email', $email)->countAllResults() > 0;
//    }
//}


namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'email', 'password', 'telepon', 'alamat', 'role', 'is_verified', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function isEmailExist($email)
    {
        return $this->where('email', $email)->countAllResults() > 0;
    }

    // Method untuk debug
    public function getLastError()
    {
        return $this->db->error();
    }
}