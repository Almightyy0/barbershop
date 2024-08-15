<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarberModel;
use Config\Services;

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

    public function ajaxList()
    {
        $request = Services::request();
        $datatable = new BarberModel($request);

        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->id_barber;
                $row[] = $list->nama;
                $row[] = $list->alamat;
                $row[] = '<img src="' . base_url('img/' . $list->foto) . '" width="150" height="150">';
                $row[] = $list->email;
                $row[] = $list->no_hp;
                $row[] = $list->role;
                $row[] = $list->status;

                $row[] = '
                <button onClick="editBarber(' . htmlspecialchars(json_encode($list)) . ')" class="bg-primary focus:outline-none hover:bg-blue-700 text-white font-bold px-2 py-1 rounded">Edit</button>
                <button onClick="deleteBarber(' . $list->id_barber . ')" class="bg-danger mt-2 focus:outline-none hover:bg-red-700 text-white font-bold px-2 py-1  rounded">Hapus</button>';
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

    public function tambahBarber()
    {
        $dataPost = $this->request->getVar();

        $foto = $this->request->getFile('foto');
        dd($dataPost, $foto);
        if (
            !$this->validate([
                'nama' => [
                    'rules' => 'required|max_length[20]',
                    'errors' => [
                        'required' => 'Nama tidak boleh kosong',
                        'max_length' => 'Nama maksimal 20 karakter',
                    ],
                ],
                'no_wa' => [
                    'rules' => 'required|regex_match[/^08\d+$/]|min_length[12]|is_unique[akun.no_hp]',
                    'errors' => [
                        'required' => 'No whatsapp tidak boleh kosong',
                        'regex_match' => 'Masukkan no whatsapp yang valid.',
                        'min_length' => 'No whatsapp minimal 12 karakter.',
                        'is_unique' => 'No whatsapp sudah terdaftar',
                    ],
                ],
                'email' => [
                    'rules' => 'required|regex_match[/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/]|is_unique[akun.email]',
                    'errors' => [
                        'required' => 'Email tidak boleh kosong',
                        'regex_match' => 'Masukkan alamat email yang valid.',
                        'is_unique' => 'Email sudah terdaftar',
                    ],
                ],
                'password' => [
                    'rules' => 'required|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()_+-={}|;:,.?<>])/]|min_length[8]|matches[repassword]',
                    'errors' => [
                        'required' => 'Password wajib diisi',
                        'regex_match' => 'Password harus terdiri dari huruf besar, kecil, simbol dan angka',
                        'min_length' => 'Password Harus memiliki 8 karakter.',
                        'matches' => 'Password harus dan repassword harus sama',
                    ],
                ],
            ])
        ) {
            $error = $this->validator->getErrors();
            $data = [
                'title' => 'Register',
                'error' => $error,
                'input' => $input,

            ];
            return view('pages/auth/register', $data);
        } else {
            $account = [
                'email' => $input['email'],
                'no_hp' => $input['no_hp'],
                'password' => password_hash($input['password'], PASSWORD_BCRYPT),
                'status' => 'aktif',
                'role' => 'pelanggan',
            ];

            $this->accountModel->save($account);

            $akun = $this->accountModel->where('email', $input['email'])->first();
            $user = [
                'nama' => $input['name'],
                'id_akun' => $akun['id_akun'],
            ];
            $this->pelangganModel->save($user);
            $user = $this->pelangganModel->where('id_akun', $akun['id_akun'])->first();
            session()->set('auth', true);
            session()->setFlashData('success', true);
            return redirect()->to(base_url('/success'));

        }
    }
}
