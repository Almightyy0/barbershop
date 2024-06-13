<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminPelanggan extends BaseController
{
    public function index()
    {
        $admin = $this->adminModel->where('id_admin', session()->get('id_user'))->first();

        $data = [
            'title' => 'Pelanggan',
            'admin' => $admin,

        ];
        return view('pages/admin/admin-pelanggan', $data);
    }
}
