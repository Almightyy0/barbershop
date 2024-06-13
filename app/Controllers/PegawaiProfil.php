<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PegawaiProfil extends BaseController
{
    public function index()
    {
        $barber = $this->barberModel->find(session()->get('id_user'));
        $akun = $this->accountModel->where('id_akun', $barber['id_akun'])->first();
        $jadwal = $this->jadwalModel->where('id_barber', session()->get('id_user'))->findAll();
        $data = [
            'title' => 'Profil',
            'barber' => $barber,
            'jadwal' => $jadwal,
            'akun' => $akun,
        ];
        return view('pages/pegawai/pegawai-profil', $data);
    }
}
