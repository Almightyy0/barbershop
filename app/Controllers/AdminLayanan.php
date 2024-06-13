<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminLayanan extends BaseController
{
    public function index()
    {
        $admin = $this->adminModel->where('id_admin', session()->get('id_user'))->first();

        $data = [
            'title' => 'Layanan',
            'admin' => $admin,
        ];
        return view('pages/admin/admin-layanan', $data);
    }
}
