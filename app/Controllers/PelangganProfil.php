<?php

namespace App\Controllers;

class PelangganProfil extends BaseController
{
    public function index()
    {
        $pelanggan = $this->pelangganModel->find(session()->get('id_user'));
        $akun = $this->accountModel->where('id_akun', $pelanggan['id_akun'])->first();
        $data = [
            'title' => 'Profil',
            'pelanggan' => $pelanggan,
            'style' => 'layanan.css',
            'akun' => $akun,
        ];
        return view('pages/pelanggan/pelanggan-profil', $data);
    }
}
