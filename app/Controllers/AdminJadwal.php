<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JadwalModel;
use Config\Services;

class AdminJadwal extends BaseController
{

    public function index()
    {
        $admin = $this->adminModel->where('id_admin', session()->get('id_user'))->first();
        $data = [
            'title' => 'Jadwal',
            'admin' => $admin,

        ];
        return view('pages/admin/admin-jadwal', $data);
    }

    public function ajaxList()
    {
        $request = Services::request();
        $datatable = new JadwalModel($request);

        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->id_jadwal;
                $row[] = $list->tgl_awal;
                $row[] = $list->tgl_akhir;
                $row[] = $list->status;
                $row[] = $list->id_barber;
                $row[] = $list->nama_barber;
                $data[] = $row;
            }

            $output = [
                'draw' => $request->getPost('draw'),
                'recordsTotal' => $datatable->countAll(),
                'recordsFiltered' => $datatable->countFiltered(),
                'data' => $data,
            ];

            return $this->response->setJSON($output);
        }
    }
}
