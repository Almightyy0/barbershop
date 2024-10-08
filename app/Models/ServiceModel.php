<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class ServiceModel extends Model
{
    protected $table = 'layanan';
    protected $primaryKey = 'id_layanan';
    protected $allowedFields = ['nama', 'deskripsi', 'harga', 'foto', 'estimasi', 'slug', 'deleted'];
    protected $column_order = ['id_layanan'];
    protected $column_search = ['id_layanan', 'nama', 'deskripsi', 'harga'];
    protected $order = ['id_layanan' => 'desc'];
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
        // $this->dt->where('status', 'true');

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
