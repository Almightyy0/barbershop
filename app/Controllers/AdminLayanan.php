<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ServiceModel;
use Config\Services;

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

    public function ajaxList()
    {
        $request = Services::request();
        $datatable = new ServiceModel($request);

        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->id_layanan;
                $row[] = $list->nama;
                $row[] = $list->deskripsi;
                $row[] = $list->harga;
                $row[] = '<img src="' . base_url('IMG/' . $list->foto) . '" width="20" height="20">';
                $row[] = $list->slug;
                $row[] = $list->estimasi;
                $row[] = $list->deleted;
                $row[] = '
                <button onClick="editLayanan(' . htmlspecialchars(json_encode($list)) . ')" class="bg-primary focus:outline-none hover:bg-blue-700 text-white font-bold px-2 py-1 rounded">Edit</button>
                <button onClick="deleteLayanan(' . $list->id_layanan . ')" class="bg-danger mt-2 focus:outline-none hover:bg-red-700 text-white font-bold px-2 py-1  rounded">Hapus</button>';
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

    public function tambahLayanan()
    {
        $foto = $this->request->getFile('foto');
        $dataPost = $this->request->getPost();
        if (
            !$this->validate([
                'foto' => [
                    'rules' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]',
                    'errors' => [
                        'uploaded' => 'Bagian ini hanya boleh diisi foto',

                    ],
                ],

            ])
        ) {
            $errors = $this->validator->getErrors();
            session()->setFlashdata('validation_errors', $errors);
            return redirect()->to(base_url('/admin/layanan'));
        } else {
            $slug = url_title($dataPost['nama'], '-', true);
            $nama_foto = $foto->getRandomName();
            $dataToSave = [
                'nama' => $dataPost['nama'],
                'deskripsi' => $dataPost['deskripsi'],
                'harga' => $dataPost['harga'],
                'estimasi' => $dataPost['estimasi'],
                'slug' => $slug,
                'foto' => $nama_foto,
                'deleted' => 'false',
            ];
            $foto->move('img', $nama_foto);
            $this->serviceModel->save($dataToSave);
            session()->setFlashData('success', 'Layanan berhasil ditambahkan');
            return redirect()->to(base_url('/admin/layanan'));
        }
    }

    public function editLayanan()
    {
        $foto = $this->request->getFile('foto');

        $dataPost = $this->request->getPost();
        if (
            !$this->validate([
                'foto' => [
                    'rules' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]',
                    'errors' => [
                        'uploaded' => 'Bagian ini hanya boleh diisi foto',
                        'max_size' => 'Ukuran foto terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',

                    ],
                ],

            ]) && !$foto->getName() == ''
        ) {

            $errors = $this->validator->getErrors();
            session()->setFlashdata('validation_errors', $errors);
            return redirect()->to(base_url('/admin/layanan'));
        } else {

            $slug = url_title($dataPost['nama'], '-', true);
            $layanan = $this->serviceModel->find($dataPost['id_layanan']);
            if ($foto->getName() == '') {
                $nama_foto = $layanan['foto'];
            } else {
                unlink('img/' . $layanan['foto']);
                $nama_foto = $foto->getRandomName();
                $foto->move('img', $nama_foto);
            }

            $dataToSave = [
                'nama' => $dataPost['nama'],
                'deskripsi' => $dataPost['deskripsi'],
                'harga' => $dataPost['harga'],
                'estimasi' => $dataPost['estimasi'],
                'slug' => $slug,
                'foto' => $nama_foto,
                'deleted' => 'false',
            ];

            $this->serviceModel->update($dataPost['id_layanan'], $dataToSave);
            session()->setFlashData('success', 'Layanan berhasil diubah');
            return redirect()->to(base_url('/admin/layanan'));
        }
    }

    public function deleteLayanan()
    {
        $id = $this->request->getPost('id-layanan');

        $this->serviceModel->update($id, ['deleted' => 'true']);
        session()->setFlashData('success', 'Layanan berhasil dihapus');
        return redirect()->to(base_url('/admin/layanan'));
    }
}
