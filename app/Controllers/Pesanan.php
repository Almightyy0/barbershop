<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

class Pesanan extends BaseController
{
    public function index($slug = false)
    {
        date_default_timezone_set('Asia/Makassar');
        $date = new Time();
        $currentDate = ($date->toDateTime());

        \Midtrans\Config::$serverKey = 'SB-Mid-server-V-q0GFVB9uYGux_Yhr1d_kAY';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $service = $this->serviceModel->where('slug', $slug)->first();

        $antrean = $this->jadwalModel->getSumAntrean();
        $jmlJadwal = count($antrean);

        for ($i = 0; $i < $jmlJadwal; $i++) {
            $temp = $this->jadwalModel->getJadwalWhereId($antrean[$i]['id_jadwal'])->first();
            $tempp = $this->jadwalModel->getJadwalWhereBarberId($antrean[$i]['id_jadwal']);
            $antrean[$i]['id_barber'] = $tempp['id_barber'];
            $antrean[$i]['nama'] = $tempp['nama'];
            $antrean[$i]['jml_antrean'] = $antrean[$i]['jumlah_id'];
            //   dd($tempp);
            if ($temp) {
                if ($temp['tgl_akhir'] > $currentDate->format('Y-m-d')) {
                    if ($temp['wkt_tunggu'] > $currentDate->format('Y-m-d H:i:s')) {
                        $antrean[$i]['wkt_tunggu'] = $temp['wkt_tunggu'];
                        $antreanWaktu = new \DateTime($temp['wkt_tunggu'], new \DateTimeZone('Asia/Makassar'));
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
                        $antrean[$i]['antrean'] = $waktuMenunggu;
                    } else {
                        $antrean[$i]['wkt_tunggu'] = 'Ready';
                        $antrean[$i]['antrean'] = 'Ready';
                    }
                } else {
                    $antrean[$i]['wkt_tunggu'] = 'Ready';
                    $antrean[$i]['antrean'] = 'Ready';
                }

            } else {
                $antrean[$i]['wkt_tunggu'] = 'Ready';
                $antrean[$i]['antrean'] = 'Ready';
            }
        }

        $hargaRupiah = number_format($service['harga'], 0, ',', '.');
        $hargaRupiah .= ',00';

        $params = [
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $service['harga'],
            ),
        ];

        $data = [
            'title' => 'Pesanan',
            'style' => 'layanan.css',
            'service' => $service,
            'jadwal' => $antrean,
            'snapToken' => \Midtrans\Snap::getSnapToken($params),
            'hargaRupiah' => $hargaRupiah,

        ];

        return view('pages/pelanggan/pelanggan-pesanan', $data);
    }

    public function pesananHandler()
    {
        $input = $this->request->getVar();

        $jadwal = $this->jadwalModel->getJadwalWhereId($input['jadwal-id'])->first();
        date_default_timezone_set('Asia/Makassar');
        $date = new Time();
        if ($jadwal) {
            if ($date->toDateTimeString() < $jadwal['wkt_tunggu']) {
                $date = new Time($jadwal['wkt_tunggu'], 'Asia/Makassar');
                $updatedate = $date->addMinutes($input['estimasi'])->toDateTimeString();
            } else {
                $updatedate = $date->addMinutes($input['estimasi'])->toDateTimeString();
            }
        } else {
            $updatedate = $date->addMinutes($input['estimasi'])->toDateTimeString();
        }

        $data = [
            'wkt_tunggu' => $updatedate,
            'payment_method' => $input['payment'],
            'status_pembayaran' => 'belum bayar',
            'status_pesanan' => 'belum ditanggapi',
            'id_pelanggan' => $input['id-pelanggan'],
            'id_layanan' => $input['id-layanan'],
            'id_jadwal' => $input['jadwal-id'],

        ];
        $this->antreanModel->save($data);
        return redirect()->to(base_url('/success-trx'));
    }

    public function success()
    {

        $data = [
            'title' => 'success',
            'style' => 'layanan.css',
        ];

        return view('pages/pelanggan/pelanggan-success', $data);
    }

}
