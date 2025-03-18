<?php

namespace App\Controllers;

class Aset extends BaseController
{


    public function __construct()
    {
        $this->tImage = service('image', 'gd');
    }


    public function index()
    {
        $this->data['title'] = 'Daftar Aset Bank';
        $this->data['jenis'] = $this->m_jenis->orderBy('kdjenis', 'ASC')->find();
        echo view('aset/list', $this->data);
    }

    public function list()
    {
        if ($this->request->is('POST')) {
            $username = $this->session->username;
            $lists = $this->m_aset->getDatatables($username);
            $no = $this->request->getVar('start');
            if ($lists) {
                # code...
                foreach ($lists as $key => $list) {
                    $no++;
                    $row = [];
                    $row[] = $no;
                    $row[] = $list->kdaset;
                    $row[] = $list->ket_jenis;
                    $row[] = $list->sertifikat;
                    $row[] = nominal($list->hargajual);
                    $row[] = $list->lokasi;
                    $row[] = $list->alamat;
                    $row[] = $list->created_at;
                    $row[] = '<div class="btn-group" role="group" aria-label="Basic example">
                <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-view" data="' . ($list->kdaset) . '"><i class="fas fa-search"></i></a>
                <a href="javascript:void(0);" class="btn btn-sm btn-success btn-image" data="' . ($list->kdaset) . '"><i class="fas fa-upload"></i></a>
                <a href="javascript:void(0);" class="btn btn-sm btn-danger btn-hapus" data="' . ($list->kdaset) . '"><i class="fas fa-trash"></i></i></a>
                </div>';
                    $data[] = $row;
                }
            } else {
                $data = [];
            }
            $output = [
                'draw' => $this->request->getPost('draw'),
                'recordsTotal' => $this->m_aset->countAll($username),
                'recordsFiltered' => $this->m_aset->countFiltered($username),
                'data' => $data
            ];

            echo json_encode($output);
        }
    }

    public function create()
    {
        if ($this->request->is('GET')) {
            $this->data['title'] = 'Registrasi Aset Bank';
            $this->data['jenis'] = $this->m_jenis->orderBy('kdjenis', 'ASC')->find();
            echo view('aset/create', $this->data);
        } elseif ($this->request->is('POST')) {
            $this->validation->setRules([
                'jenis' => 'required',
                'kdaset' => 'required',
                'luastanah' => 'required',
                'luasbangunan' => 'trim',
                'sertifikat' => 'required',
                'hargajual' => 'required',
                'deskripsi' => 'required',
                'lokasi' => 'required',
                'alamat' => 'required',
            ]);
            if ($this->validation->withRequest($this->request)->run()) {
                $post = $this->request->getVar();

                $dir = 'public/uploads/aset/';
                $object = [
                    'jenis' => $post['jenis'],
                    'kdaset' => $post['kdaset'],
                    'sertifikat' => strtoupper($post['sertifikat']),
                    'hargajual' => $post['hargajual'],
                    'alamat' => strtoupper($post['alamat']),
                    'lokasi' => strtoupper($post['lokasi']),
                    'deskripsi' => strtoupper($post['deskripsi']),
                    'luastanah' => $post['luastanah'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => strtoupper($this->session->get('username'))
                ];
                if ($post['jenis'] == '10') {
                    $object['ktidur'] = $post['ktidur'];
                    $object['kmandi'] = $post['kmandi'];
                    $object['garasi'] = $post['garasi'];
                    $object['sumberair'] = $post['sumberair'];
                    $object['listrik'] = $post['listrik'];
                    $object['luasbangunan'] = $post['luasbangunan'];
                }

                $insert = $this->m_aset->insert($object, false);
                if ($insert) {
                    $lastID = $this->m_aset->getInsertID();
                    if ($imagefile = $this->request->getFiles()) {
                        $no = 1;
                        foreach ($imagefile['image'] as $img) {
                            if ($img->isValid() && !$img->hasMoved()) {
                                $newName = $img->getRandomName();
                                $file = ["image" . $no++ => $newName];
                                $insertImg = $this->m_aset->update($lastID, $file);
                                $insertImg ? $img->move($dir, $newName) : NULL;
                            }
                        }
                    }
                    return redirect()->to('admin/aset/index')->with('success', 'Registrasi Aset berhasil!');
                }
            } else {
                $errors = array_values($this->validation->getErrors());
                $error = '';
                for ($i = 0; $i < count($errors); $i++) {
                    $error .= $errors[$i] . "</br>";
                }
                return redirect()->back()->withInput()->with('error', $error);
            }
        }
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $data = $this->m_aset->where('kdaset', $id)->first();
        $dir = 'public/uploads/aset/';
        $images = [$data['image1'], $data['image2'], $data['image3'], $data['image4'], $data['image5']];
        if ($data) {
            $delete_aset = $this->m_aset->where('kdaset', $data['kdaset'])->delete();
            if ($delete_aset) {
                for ($i = 0; $i < count($images); $i++) {
                    if (is_file($dir . $images[$i])) {
                        unlink($dir . $images[$i]);
                    }
                }
                $response = ['icon' => 'success', 'title' => 'Success', 'desc' => 'Data Aset deleted!'];
            } else {
                $response = ['icon' => 'error', 'title' => 'Error', 'desc' => 'Error occured!'];
            }
        }
        echo json_encode($response);
    }

    public function detail()
    {
        $id = $this->request->getVar('id');
        $aset = $this->m_aset->where('kdaset', $id)->first();
        if (!$aset) {
            $response = ['status' => false, 'icon' => 'error', 'title' => 'Error', 'desc' => 'Data tidak ditemukan!'];
        } else {
            $response = ['status' => true, 'aset' => $aset];
        }
        echo json_encode($response);
    }

    public function upload()
    {
        $dir = 'public/uploads/aset/';
        $id = $this->request->getVar('u_kdaset');
        if ($imagefile = $this->request->getFiles()) {
            $no = 1;
            foreach ($imagefile['image'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $file = ["image" . $no++ => $newName];
                    $insertImg = $this->m_aset->set($file)->where('kdaset', $id)->update();
                    $insertImg ? $img->move($dir, $newName) : NULL;
                }
            }
        }
        return redirect()->to('admin/aset/index')->with('success', 'Upload Photo Aset berhasil!');
    }
}
