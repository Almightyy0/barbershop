<?php

namespace App\Controllers;

class AdminDashboard extends BaseController
{
    public function index()
    {
        $admin = $this->adminModel->where('id_admin', session()->get('id_user'))->first();
        $data = [
            'title' => 'Dashboard',
            'admin' => $admin,
        ];
        return view('pages/admin/admin-dashboard', $data);
    }

}
