<?php

namespace App\Controllers;

class Setting extends BaseController
{
    public function index()
    {
        $this->data['title'] = 'Setting';
        echo view('setting', $this->data);
    }

    public function update()
    {
        $id = $this->request->getVar('id_app');
        $rules = [
            'nama_pt' => 'required',
            'email' => 'required',
            'nm_aplikasi' => 'required',
            'fnama_aplikasi' => 'required',
            'alamat_pt' => 'required',
            'pic1' => 'trim',
            'pic2' => 'trim'
        ];
        if ($this->validate($rules)) {
            $fileImage_name = $this->request->getVar('old_image');
            if (isset($_FILES) && @$_FILES['image']['error'] != '4') {
                if ($fileImage = $this->request->getFile('image')) {
                    if (!$fileImage->isValid()) {
                        throw new \RuntimeException($fileImage->getErrorString() . '(' . $fileImage->getError() . ')');
                    } else {
                        $fileImage_name = $fileImage->getRandomName();
                        $fileImage->move('public/uploads/aplikasi', $fileImage_name);
                    }
                }
            }
            $fileCetakan_name = $this->request->getVar('old_cetakan');
            if (isset($_FILES) && @$_FILES['logo_cetakan']['error'] != '4') {
                if ($fileImage = $this->request->getFile('logo_cetakan')) {
                    if (!$fileImage->isValid()) {
                        throw new \RuntimeException($fileImage->getErrorString() . '(' . $fileImage->getError() . ')');
                    } else {
                        $fileCetakan_name = $fileImage->getRandomName();
                        $fileImage->move('public/uploads/aplikasi', $fileCetakan_name);
                    }
                }
            }
            $data = [
                'nama_pt' => strtoupper($this->request->getVar('nama_pt')),
                'email_pt'  => strtolower($this->request->getVar('email')),
                'nm_aplikasi'  => strtoupper($this->request->getVar('nm_aplikasi')),
                'fnama_aplikasi'  => strtoupper($this->request->getVar('fnama_aplikasi')),
                'logo' => $fileImage_name,
                'telp_pt' => $this->request->getVar('telp'),
                'alamat_pt' => $this->request->getVar('alamat_pt'),
                'pic1' => $this->request->getVar('pic1'),
                'pic2' => $this->request->getVar('pic2'),
            ];
            $update = $this->m_app->update($id, $data);
            if ($update) {
                return redirect()->to(base_url('admin/setting'))->with('success', 'Update Configuration is Success!');
            } else {
                return redirect()->to(base_url('admin/setting'))->with('error', 'Update Configuration is Fail!');
            }
        } else {
            $errors = array_values($this->validation->getErrors());
            $error = '';
            for ($i = 0; $i < count($errors); $i++) {
                $error .= $errors[$i] . "</br>";
            }
            return redirect()->to(base_url('admin/setting'))->with('error', $error);
        }
    }
}
