<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'username', 'email', 'user_role', 'user_loc', 'password', 'image', 'created_at', 'updated_at', 'deleted_at'];

    protected $useSoftDeletes = true;
    protected $useAutoIncrement = true;

    protected $column_order = [null, 'name', 'username', 'email', 'user_loc', 'user_role'];
    protected $column_search = ['name', 'username', 'email'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $request;
    protected $db;
    protected $dt;

    public function __construct(RequestInterface $request)
    {
        parent::__construct();
        $this->db = db_connect();
        $this->request = $request;
        $this->dt = $this->db->table("$this->table u");
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

    public function getDatatables($username = null)
    {
        $this->getDatatablesQuery();
        $this->dt->select('u.*, r.role');
        if ($this->request->getVar('length') != -1)
            $this->dt->limit($this->request->getVar('length'), $this->request->getVar('start'));
        $this->dt->join('kategori_user r', 'u.user_role=r.kd_role');
        if (isset($username)) {
            $this->dt->where('u.username', $username);
        }
        $this->dt->where('deleted_at', NULL);
        $query = $this->dt->get();
        return $query->getResult();
    }

    public function countFiltered()
    {
        $this->getDatatablesQuery();
        $this->dt->where('deleted_at', NULL);
        return $this->dt->countAllResults();
    }

    public function countAll()
    {
        $tbl_storage = $this->db->table($this->table);
        $this->dt->where('deleted_at', NULL);
        return $tbl_storage->countAllResults();
    }
}
