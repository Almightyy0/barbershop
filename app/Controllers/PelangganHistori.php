<?php

namespace App\Controllers;

class PelangganHistori extends BaseController
{
    public function index()
    {
        $histori = $this->transaksiModel->getTrxPelanggan(session()->get('id_user'));

        $data = [
            'title' => 'Histori',
            'style' => 'layanan.css',
            'histori' => $histori,

        ];
        return view('pages/pelanggan/pelanggan-histori', $data);
    }
}
