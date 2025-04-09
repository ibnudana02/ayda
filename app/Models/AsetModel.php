<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class AsetModel extends Model
{
    protected $table      = 'assets';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'kdaset', 'jenis', 'luastanah', 'luasbangunan', 'sertifikat', 'hargajual', 'deskripsi', 'alamat', 'lokasi', 'shareloc',
        'ktidur', 'kmandi', 'garasi', 'listrik', 'sumberair',
        'image1', 'image2', 'image3', 'image4', 'image5', 'image6', 'image7', 'image8', 'image9', 'image10',
        'created_by', 'updated_by', 'created_at', 'updated_at'
    ];

    protected $column_order = [null, 'kdaset', 'jenis', 'sertifikat', 'hargajual', 'lokasi', 'alamat', 'a.created_at'];
    protected $column_search = ['lokasi', 'kdaset', 'sertifikat', 'alamat'];

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
        $this->dt = $this->db->table("$this->table a");
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
        $this->dt->select('a.*, ja.ket_jenis');
        if ($this->request->getVar('length') != -1)
            $this->dt->limit($this->request->getVar('length'), $this->request->getVar('start'));
        $this->dt->join('jenis_aset ja', 'a.jenis=ja.kdjenis');
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

    public function getKdaset($kdaset)
    {
        $this->dt->join('jenis_aset ja', 'a.jenis=ja.kdjenis');
        $this->dt->where('kdaset', $kdaset);
        $query = $this->dt->get();
        return $query->getRow();
    }

    public function getRecent($kdaset)
    {
        $this->dt->select('a.kdaset, a.image1, a.created_at, ja.ket_jenis, a.lokasi');
        $this->dt->join('jenis_aset ja', 'a.jenis=ja.kdjenis');
        $this->dt->whereNotIn('kdaset', [$kdaset]);
        $query = $this->dt->get();
        return $query->getResult();
    }
}
