<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminBarber extends BaseController
{
    public function index()
    {
        $admin = $this->adminModel->where('id_admin', session()->get('id_user'))->first();
        $data = [
            'title' => 'Barber',
            'admin' => $admin,

        ];
        return view('pages/admin/admin-barber', $data);
    }
}
