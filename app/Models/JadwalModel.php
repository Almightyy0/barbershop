<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';
    protected $allowedFields = ['tgl_awal', 'tgl_akhir', 'id_barber', 'status'];
    protected $column_order = ['jadwal.id_jadwal'];
    protected $column_search = ['jadwal.id_jadwal', 'jadwal.tgl_awal', 'jadwal.tgl_akhir', 'jadwal.status', 'jadwal.id_barber', 'barber.nama'];
    protected $order = ['jadwal.id_jadwal' => 'desc'];
    protected $request;
    protected $db;
    protected $dt;

    public function getJadwalWhereBarberId($id = false)
    {
        $date = new Time('now', 'Asia/Makassar');
        $currentDate = ($date->toDateString());

        return $this->select('barber.id_barber, barber.nama')
            ->join('barber', 'barber.id_barber = jadwal.id_barber') // Menambahkan select statement untuk memilih kolom yang ingin diambil
            ->where('tgl_awal <=', $currentDate) // Menambahkan where statement untuk memfilter data berdasarkan tanggal
            ->where('tgl_akhir >=', $currentDate) // Menambahkan where statement untuk memfilter data berdasarkan tanggal
            ->where('jadwal.status', 'ada')
            ->where('jadwal.id_jadwal', $id)
            ->first(); // Mengambil semua data yang cocok dengan query

    }

    public function getSumAntrean()
    {
        $date = new Time('now', 'Asia/Makassar');
        $currentDate = ($date->toDateString());

        return $this->select('jadwal.id_jadwal, IFNULL(COUNT(antrean.id_jadwal), 0) AS jumlah_id')
            ->join('antrean', 'jadwal.id_jadwal = antrean.id_jadwal', 'left')
            ->where('tgl_awal <=', $currentDate) // Menambahkan where statement untuk memfilter data berdasarkan tanggal
            ->where('tgl_akhir >=', $currentDate)
            ->where('jadwal.status', 'ada')
            ->groupBy('jadwal.id_jadwal')
            ->orderBy('jumlah_id', 'asc')
            ->findAll();
    }

    public function getJadwalWhereId($id = false)
    {
        $date = new Time('now', 'Asia/Makassar');
        $currentDate = ($date->toDateString());

        if ($id) {
            return $this->select('jadwal.*, antrean.*')
                ->join('antrean', 'antrean.id_jadwal = jadwal.id_jadwal') // Menambahkan select statement untuk memilih kolom yang ingin diambil
                ->where('jadwal.tgl_awal <=', $currentDate) // Menambahkan where statement untuk memfilter data berdasarkan tanggal
                ->where('jadwal.tgl_akhir >=', $currentDate) // Menambahkan where statement untuk memfilter data berdasarkan tanggal
                ->where('jadwal.status', 'ada')
                ->where('jadwal.id_jadwal', $id)
                ->orderBy('wkt_tunggu', 'desc');
        }

        return $this->select('jadwal.*, antrean.*')
            ->join('antrean', 'antrean.id_jadwal = jadwal.id_jadwal') // Menambahkan select statement untuk memilih kolom yang ingin diambil
            ->where('jadwal.tgl_awal <=', $currentDate) // Menambahkan where statement untuk memfilter data berdasarkan tanggal
            ->where('jadwal.tgl_akhir >=', $currentDate) // Menambahkan where statement untuk memfilter data berdasarkan tanggal
            ->where('jadwal.status', 'ada')
            ->orderBy('wkt_tunggu', 'desc');

    }

    public function __construct(RequestInterface $request = null)
    {
        parent::__construct();
        $this->db = db_connect();
        $this->request = $request;
        $this->dt = $this->db->table($this->table);
    }

    private function getDatatablesQuery()
    {
        $this->dt->select('jadwal.*, barber.nama AS nama_barber');
        $this->dt->join('barber', 'barber.id_barber = jadwal.id_barber');

        $i = 0;
        foreach ($this->column_search as $item) {
            if ($this->request->getPost('search')['value']) {
                if ($i === 0) {
                    $this->dt->groupStart();
                    $this->dt->like($item, $this->request->getPost('search')['value']);
                } else {
                    $this->dt->orLike($item, $this->request->getPost('search')['value']);
                }
                if (count($this->column_search) - 1 == $i) {
                    $this->dt->groupEnd();
                }
            }
            $i++;
        }

        if ($this->request->getPost('order')) {
            $this->dt->orderBy($this->column_order[$this->request->getPost('order')['0']['column']], $this->request->getPost('order')['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->dt->orderBy(key($order), $order[key($order)]);
        }

        // Debugging output

    }

    public function getDatatables()
    {
        $this->getDatatablesQuery();
        if ($this->request->getPost('length') != -1) {
            $this->dt->limit($this->request->getPost('length'), $this->request->getPost('start'));
        }

        $query = $this->dt->get();
        return $query->getResult();
    }

    public function countFiltered($id = null)
    {
        $this->getDatatablesQuery($id);
        return $this->dt->countAllResults();
    }

    public function countAll()
    {
        $tbl_storage = $this->db->table($this->table);
        return $tbl_storage->countAllResults();
    }

}
