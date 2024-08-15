<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class BarberModel extends Model
{
    protected $table = 'barber';
    protected $primaryKey = 'id_barber';
    protected $allowedFields = ['nama', 'alamat', 'foto', 'id_akun'];
    protected $column_order = ['barber.id_barber'];
    protected $column_search = ['barber.id_barber', 'barber.nama', 'barber.alamat', 'akun.id_akun', 'akun.email', 'akun.no_hp', 'akun.role', 'akun.status'];
    protected $order = ['barber.id_barber' => 'desc'];
    protected $request;
    protected $db;
    protected $dt;

    public function __construct(RequestInterface $request = null)
    {
        parent::__construct();
        $this->db = db_connect();
        $this->request = $request;
        $this->dt = $this->db->table($this->table);
    }

    private function getDatatablesQuery()
    {
        $this->dt->select('barber.*, akun.*');
        $this->dt->join('akun', 'akun.id_akun = barber.id_akun');
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
