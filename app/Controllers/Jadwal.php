<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Jadwal extends BaseController
{
    public function index()
    {
        $barber = $this->barberModel->find(session()->get('id_user'));
        $jadwal = $this->jadwalModel->where('id_barber', session()->get('id_user'))->findAll();
        $data = [
            'title' => 'Jadwal',
            'barber' => $barber,
            'jadwal' => $jadwal,
        ];
        return view('pages/pegawai/pegawai-jadwal', $data);
    }
}
