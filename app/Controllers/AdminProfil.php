<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Adminprofil extends BaseController
{
    public function index()
    {
        $admin = $this->adminModel->find(session()->get('id_user'));
        $akun = $this->accountModel->where('id_akun', $admin['id_akun'])->first();
        $jadwal = $this->jadwalModel->where('id_barber', session()->get('id_user'))->findAll();
        $data = [
            'title' => 'Profil',
            'admin' => $admin,
            'jadwal' => $jadwal,
            'akun' => $akun,
        ];
        return view('pages/admin/admin-profil', $data);
    }
}
