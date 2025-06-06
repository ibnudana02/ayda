<?php

namespace App\Controllers;

class Front extends BaseController
{
    public function index1()
    {
        $this->data['title'] = 'Daftar Aset Bank';
        $this->data['aset'] = $this->m_aset->join('jenis_aset ja', 'assets.jenis=ja.kdjenis')->findAll();
        echo view('frontend/lelang', $this->data);
    }

    public function index()
    {
        $this->data['title'] = 'Daftar Aset Bank';
        $this->data['aset'] = $this->m_aset->join('jenis_aset ja', 'assets.jenis=ja.kdjenis')->findAll();
        $result = $this->m_aset->join('jenis_aset ja', 'assets.jenis=ja.kdjenis')->findAll(5, 0);
        // $page = 1;
        // $paginator = Paginator::createFromArray($result, $page);
        // $this->data['paginator'] = $paginator;        
        echo view('frontend/lelang', $this->data);
    }

    public function detail($kdaset)
    {
        $detail = $this->m_aset->getKdaset($kdaset);
        if ($detail) {
            $this->data['title'] = "$detail->ket_jenis DI $detail->lokasi";
            $this->data['detail'] = $detail;
            $this->data['recent'] = $this->m_aset->getRecent($kdaset);

            // echo "<pre>";
            // print_r($this->data);
            // echo "</pre>";
            // die;

            echo view('frontend/detail', $this->data);
        }
    }

    public function kontak()
    {

        $this->data['title'] = 'Hubungi Kami';

        // echo "<pre>";
        // print_r($this->data);
        // echo "</pre>";
        // die;

        echo view('frontend/kontak', $this->data);
    }
}
