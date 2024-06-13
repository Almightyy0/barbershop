<?php

namespace App\Controllers;

class PelangganDashboard extends BaseController
{
    public function index()
    {
        if (session()->get('id_user') != null) {
            $pelanggan = $this->pelangganModel->find(session()->get('id_user'));
            $akun = $this->accountModel->where('id_akun', $pelanggan['id_akun'])->first();
        } else {
            $pelanggan = '';
            $akun = '';
        }

        $data = [
            'title' => 'Beranda',
            'style' => 'navbar.css',
            'pelanggan' => $pelanggan,
            'akun' => $akun,

        ];
        return view('pages/pelanggan/pelanggan-dashboard', $data);
    }
}
