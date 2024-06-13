<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use Config\Services;

class PegawaiHistori extends BaseController
{
    public function index()
    {
        $barber = $this->barberModel->find(session()->get('id_user'));
        // dd($histori);
        $data = [
            'title' => 'Histori',
            'barber' => $barber,
        ];

        return view('pages/pegawai/pegawai-histori', $data);
    }

    public function ajaxList()
    {
        $request = Services::request();
        $datatable = new TransaksiModel($request);

        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables(session()->get('id_user'));
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
