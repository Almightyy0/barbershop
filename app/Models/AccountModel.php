<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model
{
    protected $table      = 'akun';
    protected $primaryKey = 'id_akun';
    protected $allowedFields = ['email','no_hp', 'password', 'role', 'status' ,'id_user'];


    public function accountVerify($email, $password)    //method untuk melakukan validasi apakh username atau password tersedia 
    {                                                       //jika tersedia maka kembalikan nilai true jika tidak kembalikan nilai false
        $account = $this->where('email', $email)->first();
        if ($account && password_verify($password, $account['password'])) {
            return $account;
        }
        return false;
    }

}