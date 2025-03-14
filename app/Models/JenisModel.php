<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class JenisModel extends Model
{
    protected $table      = 'jenis_aset';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'kdjenis', 'ket_jenis', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];

    protected $column_order = [null, 'kdjenis', 'jenis', 'created_at'];
    protected $column_search = ['jenis'];

    protected $useAutoIncrement = true;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $request;
    protected $db;
    protected $dt;

    public function __construct(RequestInterface $request)
    {
        parent::__construct();
        $this->db = db_connect();
        $this->request = $request;
        $this->dt = $this->db->table("$this->table t");
    }

    private function getDatatablesQuery()
    {
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($this->request->getPost('search')['value']) {
                if ($i === 0) {
                    $this->dt->groupStart();
                    $this->dt->like($item, $this->request->getVar('search')['value']);
                } else {
                    $this->dt->orLike($item, $this->request->getVar('search')['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->dt->groupEnd();
            }
            $i++;
        }

        if ($this->request->getVar('order')) {
            $this->dt->orderBy($this->column_order[$this->request->getVar('order')['0']['column']], $this->request->getVar('order')['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->dt->orderBy(key($order), $order[key($order)]);
        }
    }

    public function getDatatables($username = NULL)
    {
        $this->getDatatablesQuery();
        if ($this->request->getVar('length') != -1)
            $this->dt->limit($this->request->getVar('length'), $this->request->getVar('start'));
        if ($username) {
            $this->dt->where('created_by', $username);
        }
        $query = $this->dt->get();
        return $query->getResult();
    }

    public function countFiltered($username = NULL)
    {
        $this->getDatatablesQuery();
        if ($username) {
            $this->dt->where('created_by', $username);
        }
        return $this->dt->countAllResults();
    }

    public function countAll($username = NULL)
    {
        $tbl_storage = $this->db->table($this->table);
        if ($username) {
            $this->dt->where('created_by', $username);
        }
        return $tbl_storage->countAllResults();
    }
}
