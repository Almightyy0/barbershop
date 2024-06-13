<?php

namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class AntreanModel extends Model
{
    protected $table = 'antrean';
    protected $primaryKey = 'id_antrean';
    protected $allowedFields = [
        'wkt_tunggu',
        'payment_method',
        'status_pembayaran',
        'status_pesanan',
        'id_pelanggan',
        'jml_antrean',
        'wkt_tunggu',
        'id_layanan',
        'id_jadwal'];
    public function getAntrean($idJadwal = false)
    {
        $date = new Time('now', 'Asia/Makassar');
        $currentDate = ($date->toDateString());

        if ($idJadwal) {
            return $this->select('antrean.*, layanan.nama AS layanan, layanan.harga, jadwal.*, pelanggan.nama AS pelanggan') // Menambahkan select statement untuk memilih kolom yang ingin diambil
                ->join('jadwal', 'jadwal.id_jadwal = antrean.id_jadwal')
                ->join('pelanggan', 'pelanggan.id_pelanggan = antrean.id_pelanggan')
                ->join('layanan', 'layanan.id_layanan = antrean.id_layanan') // Menambahkan join statement untuk menghubungkan tabel barber
                ->where('antrean.id_jadwal', $idJadwal)
                ->where('jadwal.tgl_akhir >', $currentDate) // Menambahkan where statement untuk memfilter data berdasarkan tanggal
                ->findAll(); // Mengambil semua data yang cocok dengan query
        }
        return $this->select('antrean.*, jadwal.*,barber.*') // Menambahkan select statement untuk memilih kolom yang ingin diambil
            ->join('jadwal', 'jadwal.id_jadwal = antrean.id_antrean')
            ->join('barber', 'barber.id_barber = jadwal.id_barber') // Menambahkan join statement untuk menghubungkan tabel barber
            ->where('jadwal.tgl_akhir >', $currentDate) // Menambahkan where statement untuk memfilter data berdasarkan tanggal
            ->findAll(); // Mengambil semua data yang cocok dengan query

    }

    public function getAntreanWherePelangganId($id)
    {
        date_default_timezone_set('Asia/Makassar');
        $date = new Time();
        $currentDate = ($date->toDateTime());

        return $this->select('antrean.*')
            ->where('id_pelanggan', $id)
            ->findAll();

    }

}
