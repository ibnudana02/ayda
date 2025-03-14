<?php

namespace App\Controllers;

class Jenis extends BaseController
{
    public function index()
    {
        $this->data['title'] = 'Daftar Jenis Aset';
        echo view('jenis/list', $this->data);
    }

    public function list()
    {
        if ($this->request->is('POST')) {
            $username = $this->session->username;
            $lists = $this->m_jenis->getDatatables($username);
            $data = [];
            $no = $this->request->getVar('start');

            foreach ($lists as $key => $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->kdjenis;
                $row[] = $list->ket_jenis;
                $row[] = date('Y-m-d H:i:s', strtotime($list->created_at));
                $row[] = '<div class="btn-group" role="group" aria-label="Basic example">
                            <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-edit" data="' . $list->id . '"><i class="fas fa-pencil-alt"></i></a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-danger btn-hapus" data="' . $list->id . '"><i class="fas fa-trash"></i></i></a>
                        </div>';
                $data[] = $row;
            }
            $output = [
                'draw' => $this->request->getPost('draw'),
                'recordsTotal' => $this->m_jenis->countAll($username),
                'recordsFiltered' => $this->m_jenis->countFiltered($username),
                'data' => $data
            ];

            echo json_encode($output);
        }
    }

    public function create()
    {
        $rules = [
            'kdjenis' => 'required',
            'jenis' => 'required',
        ];

        if ($this->request->is('GET')) {
            $this->data['title'] = 'Tambah Jenis Aset';
            echo view('jenis/create', $this->data);
        } elseif ($this->request->is('POST')) {
            if ($this->validate($rules)) {
                $post = $this->request->getVar();
                $object = ['kdjenis' => $post['kdjenis'], 'ket_jenis' => strtoupper($post['jenis']), 'created_at' => date('Y-m-d H:i:s'), 'created_by' => strtoupper($this->session->get('username'))];
                $insert = $this->m_jenis->insert($object, false);
                if ($insert) {
                    return redirect()->to('jenis/index')->with('success', 'Simpan Jenis Aset Berhasil!');
                } else {
                    return redirect()->back()->with('error', 'Simpan Jenis Aset Gagal!');
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
        $data = $this->m_jenis->find($id);
        if ($data) {
            $delete = $this->m_jenis->delete($data['id']);
            if ($delete) {
                $response = ['icon' => 'success', 'title' => 'Success', 'desc' => 'Transaction deleted!'];
            } else {
                $response = ['icon' => 'error', 'title' => 'Error', 'desc' => 'Error occured!'];
            }
        }
        echo json_encode($response);
    }

    public function detail()
    {
        $id = $this->request->getVar('id');
        $data = $this->m_jenis->find($id);
        if (!$data) {
            $response = ['status' => false, 'icon' => 'error', 'title' => 'Error', 'desc' => 'Data tidak ditemukan!'];
        } else {
            $response = ['status' => true, 'data' => $data,];
        }
        echo json_encode($response);
    }

    public function update()
    {
        $id = $this->request->getVar('id');
        $this->validation->setRules([
            'kdjenis' => 'required',
            'ket_jenis' => 'required',
        ]);

        if ($this->validation->withRequest($this->request)->run()) {
            $object = ['ket_jenis' => strtoupper($this->request->getVar('ket_jenis'))];
            $update = $this->m_jenis->update($id, $object);
            if ($update) {
                // $response = ['status' => true, 'icon' => 'success', 'title' => 'Success!', 'desc' => 'Data berhasil diupdate!'];
                return redirect()->back()->with('success', 'Data berhasil diupdate!');
            } else {
                return redirect()->back()->with('error', 'Data gagal diupdate!');
                // $response = ['status' => false, 'icon' => 'error', 'title' => 'Error', 'desc' => 'Data gagal diupdate!'];
            }
            // echo json_encode($response);
        } else {
            $errors = array_values($this->validation->getErrors());
            $error = '';
            for ($i = 0; $i < count($errors); $i++) {
                $error .= $errors[$i] . "</br>";
            }
            return redirect()->back()->with('error', $error);
        }
    }
}
