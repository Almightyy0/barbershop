<?php

namespace App\Controllers;

class AdminDashboard extends BaseController
{
    public function index()
    {
        $admin = $this->adminModel->where('id_admin', session()->get('id_user'))->first();
        $total = $this->transaksiModel->where('status', 'selesai')->selectSum('total')->first();
        $totalPegawai = $this->barberModel->countAllResults();
        $totalLayanan = $this->serviceModel->where('deleted', 'false')->countAllResults();
        $totalTransaksi = $this->transaksiModel->where('status', 'selesai')->countAllResults();
        $totalPelanggan = $this->pelangganModel->countAllResults();
        $totalLayanan = $this->serviceModel->countAllResults();
        $transaksi = $this->transaksiModel->where('status', 'selesai')->findAll();
        $penjualanData = $this->transaksiModel->getPenjualanPerBulan();

        $penjualanPerBulan = array_fill(0, 12, 0);

        foreach ($penjualanData as $penjualan) {
            $bulan = date('n', strtotime($penjualan['bulan'])) - 1; // Mengurangi 1 karena indeks array dimulai dari 0
            $penjualanPerBulan[$bulan] = $penjualan['total'];
        }

        $data = [
            'title' => 'Dashboard',
            'admin' => $admin,
            'total' => $total['total'],
            'totalPegawai' => $totalPegawai,
            'totalLayanan' => $totalLayanan,
            'totalTransaksi' => $totalTransaksi,
            'totalPelanggan' => $totalPelanggan,
            'layanan' => $totalLayanan,
            'penjualan' => $penjualanPerBulan,
        ];
        return view('pages/admin/admin-dashboard', $data);
    }

}
