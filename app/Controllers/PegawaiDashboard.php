<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

class PegawaiDashboard extends BaseController
{
    public function index()
    {
        date_default_timezone_set('Asia/Makassar');
        $date = new Time();

        $barber = $this->barberModel->find(session()->get('id_user'));

        $jadwal = $this->jadwalModel->where('id_barber', session()->get('id_user'))->first();
        $antrean = $this->antreanModel->where('id_jadwal', $jadwal['id_jadwal'])->findAll();
        $jlmAntrean = count($antrean);

        $jmlTrxSuccess = $this->transaksiModel->where('id_barber', session()->get('id_user'))->where('status', 'selesai')->where('tanggal', $date->format('y-m-d'))->countAllResults();
        $jmlTrxPending = $this->antreanModel->where('id_jadwal', $jadwal['id_jadwal'])->where('status_pesanan', 'belum ditanggapi')->countAllResults();
        $jmlTrxRejected = $this->transaksiModel->where('id_barber', session()->get('id_user'))->where('status', 'dibatalkan barber')->where('tanggal', $date->format('y-m-d'))->countAllResults();
        $antreanJadwalId = $this->antreanModel->getAntrean($jadwal['id_jadwal']);
        $transaksi = $this->transaksiModel->where('id_barber', session()->get('id_user'))->where('status', 'selesai')->where('MONTH(tanggal)', $date->getMonth())->where('YEAR(tanggal)', $date->getYear())->findAll();
        $jmlAntreanSucess = $this->transaksiModel->where('id_barber', session()->get('id_user'))->where('status', 'selesai')->where('MONTH(tanggal)', $date->getMonth())->where('YEAR(tanggal)', $date->getYear())->countAllResults();
        $total = 0;

        for ($i = 0; $i < count($transaksi); $i++) {
            if ($transaksi[$i]['status'] == 'selesai') {
                $total += $transaksi[$i]['total'];
            }
        }

        $data = [
            'title' => 'Dashboard',
            'jmlAntrean' => $jlmAntrean,
            'jmlTrxSuccess' => $jmlTrxSuccess,
            'jmlTrxPending' => $jmlTrxPending,
            'jmlTrxRejected' => $jmlTrxRejected,
            'antrean' => $antreanJadwalId,
            'total' => $total / 1000,
            'jmlAntreanSuccess' => $jmlAntreanSucess,
            'jadwal' => $jadwal,
            'barber' => $barber,
        ];

        return view('pages/pegawai/pegawai-dashboard', $data);
    }

    public function keluar()
    {
        $data = [
            'status' => 'tidak-ada',
        ];
        $this->jadwalModel->set($data)->where('id_barber', session()->get('id_user'))->update();
        return redirect()->to(base_url('/pegawai'));
    }

    public function masuk()
    {
        $data = [
            'status' => 'ada',
        ];
        $this->jadwalModel->set($data)->where('id_barber', session()->get('id_user'))->update();

        return redirect()->to(base_url('/pegawai'));
    }

    public function terima($id)
    {
        $data = [
            'status_pesanan' => 'diterima',
        ];
        $this->antreanModel->update($id, $data);
        return redirect()->to(base_url('/pegawai'));
    }
    public function tolak($id)
    {
        date_default_timezone_set('Asia/Makassar');
        $date = new Time();

        $antrean = $this->antreanModel->find($id);
        $jadwal = $this->jadwalModel->find($antrean['id_jadwal']);
        $layanan = $this->serviceModel->find($antrean['id_layanan']);

        $data = [
            'tanggal' => $date->format('y-m-d'),
            'id_layanan' => $antrean['id_layanan'],
            'id_pelanggan' => $antrean['id_pelanggan'],
            'id_barber' => $jadwal['id_barber'],
            'metode_pembayaran' => $antrean['payment_method'],
            'total' => $layanan['harga'],
            'status' => 'dibatalkan barber',
        ];

        $this->transaksiModel->save($data);
        $this->antreanModel->delete($id);

        return redirect()->to(base_url('/pegawai'));
    }

    public function selesai($id)
    {
        date_default_timezone_set('Asia/Makassar');
        $date = new Time();

        $antrean = $this->antreanModel->find($id);
        $jadwal = $this->jadwalModel->find($antrean['id_jadwal']);
        $layanan = $this->serviceModel->find($antrean['id_layanan']);

        $data = [
            'tanggal' => $date->format('y-m-d'),
            'id_layanan' => $antrean['id_layanan'],
            'id_pelanggan' => $antrean['id_pelanggan'],
            'id_barber' => $jadwal['id_barber'],
            'metode_pembayaran' => $antrean['payment_method'],
            'total' => $layanan['harga'],
            'status' => 'selesai',
        ];

        $this->transaksiModel->save($data);
        $this->antreanModel->delete($id);

        return redirect()->to(base_url('/pegawai'));
    }

}
