<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

class PesananStatus extends BaseController
{
    public function index()
    {

        date_default_timezone_set('Asia/Makassar');
        $date = new Time();
        $currentDate = ($date->toDateTime());
        $total = 0;
        $antrean = $this->antreanModel->getAntreanWherePelangganId(session()->get('id_user'));
        $rincian['jml_pesanan'] = $this->antreanModel->countAllResults();
        $rincian['jml_sudah_bayar'] = $this->antreanModel->where('status_pembayaran', 'Sudah Bayar')->countAllResults();
        $rincian['jml_belum_bayar'] = $this->antreanModel->where('status_pembayaran', 'belum bayar')->countAllResults();

        for ($i = 0; $i < count($antrean); $i++) {
            $layanan = $this->serviceModel->find($antrean[$i]['id_layanan']);
            $antrean[$i]['nama-layanan'] = $layanan['nama'];

            $jadwal = $this->jadwalModel->find($antrean[$i]['id_jadwal']);
            $barber = $this->barberModel->find($jadwal['id_barber']);
            $antrean[$i]['barber'] = $barber['nama'];
            $antrean[$i]['id-barber'] = $barber['id_barber'];

            $total += $layanan['harga'];
            $hargaRupiah = number_format($layanan['harga'], 0, ',', '.');
            $hargaRupiah .= ',00';
            $antrean[$i]['harga'] = $hargaRupiah;

            $antrean[$i]['foto'] = $layanan['foto'];
            if ($antrean[$i]['wkt_tunggu'] >= $currentDate->format('Y-m-d H:i:s')) {
                $antreanWaktu = new \DateTime($antrean[$i]['wkt_tunggu'], new \DateTimeZone('Asia/Makassar'));
                $currentDatetime = new \DateTime('Asia/Makassar'); // Waktu saat ini

                $difference = $antreanWaktu->getTimestamp() - $currentDatetime->getTimestamp();
                $selisihMenit = round($difference / 60);

                $hours = floor($selisihMenit / 60);
                $minutes = $selisihMenit % 60;

                // Format angka menjadi dua digit
                $hours = str_pad($hours, 2, '0', STR_PAD_LEFT);
                $minutes = str_pad($minutes, 2, '0', STR_PAD_LEFT);

                // Gabungkan waktu dan tambahkan string ' menit'
                $waktuMenunggu = $hours . ' : ' . $minutes . ' Menit';

                // Simpan dalam variabel $antrean
                $firstQue = $this->antreanModel->where('id_jadwal', $antrean[$i]['id_jadwal'])->orderBy('wkt_tunggu', 'ASC')->first();

                if ($antrean[$i]['id_antrean'] === $firstQue['id_antrean']) {
                    $antrean[$i]['wkt_tunggu'] = 'Barber siap';
                } else {
                    $antrean[$i]['wkt_tunggu'] = $waktuMenunggu;
                }

            } else {
                $antrean[$i]['wkt_tunggu'] = 'Barber siap';
            }

        }

        $totalRupiah = number_format($total, 0, ',', '.');
        $totalRupiah .= ',00';
        $rincian['total'] = $totalRupiah;
        $data = [
            'title' => 'Status Pesanan',
            'style' => 'layanan.css',
            'antrean' => $antrean,
            'rincian' => $rincian,
        ];
        return view('pages/pelanggan/pelanggan-status-pesanan', $data);
    }

    public function batalkanPesanan()
    {
        $input = $this->request->getVar();
        $antrean = $this->antreanModel->find($input['id-antrean']);
        $jadwal = $this->jadwalModel->find($antrean['id_jadwal']);
        $layanan = $this->serviceModel->find($antrean['id_layanan']);

        if (!$antrean) {
            session()->setFlashData('error', 'pesanan tidak ditemukan');
            return redirect()->back();
        }

        date_default_timezone_set('Asia/Makassar');
        $date = new Time();

        $transaksi = [
            'tanggal' => $date->format('Y-m-d'),
            'id_pelanggan' => $antrean['id_pelanggan'],
            'id_barber' => $jadwal['id_barber'],
            'id_layanan' => $antrean['id_layanan'],
            'metode_pembayaran' => $antrean['payment_method'],
            'total' => $layanan['harga'],
            'status' => 'dibatalkan pembeli',

        ];

        $this->antreanModel->delete($input['id-antrean']);
        $this->transaksiModel->save($transaksi);
        session()->setFlashData('success', 'Pesanan berhasil dibatalkan');
        return redirect()->back();
    }

}
