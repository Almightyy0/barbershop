<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use Config\Services;

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

    public function ajaxList()
    {
        $request = Services::request();
        $datatable = new TransaksiModel($request);

        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->id_transaksi;
                $row[] = $list->tanggal;
                $row[] = $list->id_layanan;
                $row[] = $list->nama_layanan;
                $row[] = $list->id_pelanggan;
                $row[] = $list->nama_pelanggan;
                $row[] = $list->id_barber;
                $row[] = $list->nama_barber;
                $row[] = $list->metode_pembayaran;
                $row[] = $list->status;
                $row[] = $list->total;
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
