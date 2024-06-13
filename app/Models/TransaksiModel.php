<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['tanggal', 'id_layanan', 'id_pelanggan', 'id_barber', 'metode_pembayaran', 'total', 'status'];
    protected $column_order = ['transaksi.id_transaksi'];
    protected $column_search = ['transaksi.id_transaksi', 'transaksi.tanggal', 'transaksi.total', 'transaksi.id_layanan', 'transaksi.id_pelanggan', 'transaksi.id_barber', 'transaksi.metode_pembayaran', 'transaksi.status', 'layanan.nama', 'pelanggan.nama', 'barber.nama'];
    protected $order = ['transaksi.id_transaksi' => 'desc'];
    protected $request;
    protected $db;
    protected $dt;

    public function getTrxPelanggan($id = null)
    {
        return $this->select('transaksi.*, layanan.nama AS nama_layanan, pelanggan.nama AS nama_pelanggan, barber.nama AS nama_barber') // Menambahkan select statement untuk memilih kolom yang ingin diambil
            ->join('barber', 'barber.id_barber = transaksi.id_barber')
            ->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan')
            ->join('layanan', 'layanan.id_layanan = transaksi.id_layanan') // Menambahkan join statement untuk menghubungkan tabel barber
            ->where('transaksi.id_pelanggan', $id)
            ->orderBy('transaksi.id_transaksi', 'desc')
            ->findAll();
    }
    public function __construct(RequestInterface $request = null)
    {
        parent::__construct();
        $this->db = db_connect();
        $this->request = $request;
        $this->dt = $this->db->table($this->table);
    }

    private function getDatatablesQuery($id = null)
    {
        $this->dt->select('transaksi.*, layanan.nama AS nama_layanan, pelanggan.nama AS nama_pelanggan, barber.nama AS nama_barber');
        $this->dt->join('barber', 'barber.id_barber = transaksi.id_barber');
        $this->dt->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan');
        $this->dt->join('layanan', 'layanan.id_layanan = transaksi.id_layanan');

        if ($id) {
            $this->dt->where('transaksi.id_barber', $id);
        }

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

    public function getDatatables($id = null)
    {
        $this->getDatatablesQuery($id);
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