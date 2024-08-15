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
        $barber = $this->barberModel->findAll();
        $data = [
            'title' => 'Jadwal',
            'admin' => $admin,
            'barber' => $barber,

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
                $row[] = '
                <button id="edit-btn-' . $list->id_jadwal . '" onClick="editJadwal(' . htmlspecialchars(json_encode($list)) . ')" class="bg-primary focus:outline-none hover:bg-blue-700 text-white font-bold px-2 py-1 rounded" data-id="' . $list->id_jadwal . '">Edit</button>
                <button onClick="deleteJadwal(' . $list->id_jadwal . ')" class="bg-danger focus:outline-none hover:bg-red-700 text-white font-bold px-2 py-1  rounded" data-id="' . $list->id_jadwal . '">Hapus</button>';
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

    public function tambahJadwal()
    {
        $dataPost = $this->request->getVar();

        $barber = $this->jadwalModel->where('id_barber', $dataPost['barber'])->first();

        if ($dataPost['tgl-awal'] > $dataPost['tgl-akhir']) {
            session()->setFlashData('error', 'Tanggal awal harus lebih kecil dari tanggal akhir');
            return redirect()->to('/admin/jadwal');
        }
        if ($barber != null) {
            session()->setFlashData('error-barber', 'Barber sudah ada di jadwal lain');
            return redirect()->to('/admin/jadwal');
        }

        $data = [
            'tgl_awal' => $dataPost['tgl-awal'],
            'tgl_akhir' => $dataPost['tgl-akhir'],
            'status' => 'tidak ada',
            'id_barber' => $dataPost['barber'],
        ];
        $this->jadwalModel->save($data);

        session()->setFlashData('success', 'Data berhasil ditambahkan');
        return redirect()->to('/admin/jadwal');

    }

    public function editJadwal()
    {

        $dataPost = $this->request->getVar();
        $barber = $this->jadwalModel->where('id_barber', $dataPost['barber'])->first();
        $list = [
            'tgl_awal' => $dataPost['tgl-awal'],
            'tgl_akhir' => $dataPost['tgl-akhir'],
            'status' => $dataPost['status'],
            'id_barber' => $dataPost['barber'],
            "nama_barber" => "John Doe",
        ];

        session()->setFlashData('list', json_encode($list));
        if ($dataPost['tgl-awal'] > $dataPost['tgl-akhir']) {
            session()->setFlashData('error-edit', true);
            session()->setFlashData('id-jadwal', $dataPost['id-jadwal']);
            return redirect()->to('/admin/jadwal');
        }

        if ($dataPost['barber'] != $dataPost['id-old']) {
            if ($barber != null) {
                session()->setFlashData('error-barber-edit', true);
                session()->setFlashData('id-jadwal', $dataPost['id-jadwal']);
                return redirect()->to('/admin/jadwal');
            }
        }

        $data = [
            'tgl_awal' => $dataPost['tgl-awal'],
            'tgl_akhir' => $dataPost['tgl-akhir'],
            'status' => $dataPost['status'],
            'id_barber' => $dataPost['barber'],
        ];
        $this->jadwalModel->update($dataPost['id-jadwal'], $data);

        return redirect()->to('/admin/jadwal');
    }

    public function deleteJadwal()
    {

        $postData = $this->request->getVar();

        $this->jadwalModel->delete($postData['id-jadwal']);
        session()->setFlashData('success', 'Data berhasil dihapus');
        return redirect()->to('/admin/jadwal');
    }
}
