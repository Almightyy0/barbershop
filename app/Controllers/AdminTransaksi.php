<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminTransaksi extends BaseController
{
    public function index()
    {
        $admin = $this->adminModel->where('id_admin', session()->get('id_user'))->first();
        $data = [
            'title' => 'Transaksi',
            'admin' => $admin,

        ];
        return view('pages/admin/admin-transaksi', $data);
    }
}
