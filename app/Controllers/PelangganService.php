<?php

namespace App\Controllers;

class PelangganService extends BaseController
{
    public function index()
    {
        $services = $this->serviceModel->where('deleted', 'false')->findAll();
        $jlmServices = count($services);
        for ($i = 0; $i < $jlmServices; $i++) {
            $services[$i]['harga'] = number_format($services[$i]['harga'], 0, ',', '.');
            $services[$i]['harga'] .= ',00';
        }

        $data = [
            'title' => 'Layanan',
            'style' => 'layanan.css',
            'services' => $services,

        ];
        return view('pages/pelanggan/pelanggan-service', $data);
    }
}
