<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $this->data['title'] = 'Daftar User';
        $this->data['role'] = $this->role_m->findAll();

        echo view('user/list', $this->data);
    }

    public function create()
    {
        $this->data['title'] = 'Registrasi User';
        $this->data['role'] = $this->role_m->findAll();

        echo view('user/create', $this->data);
    }

    public function list()
    {
        if ($this->request->is('POST')) {

            $lists = $this->m_user->getDatatables();

            $data = [];
            $no = $this->request->getVar('start');

            foreach ($lists as $key => $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->name;
                $row[] = $list->username;
                $row[] = $list->email;
                $row[] = $list->role;
                $row[] = '<div class="btn-group" role="group" aria-label="Basic example">
                            <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-edit" data="' . $list->id . '"><i class="fas fa-pencil-alt"></i></a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-danger btn-hapus" data="' . $list->id . '"><i class="fas fa-trash"></i></i></a>
                        </div>';
                $data[] = $row;
            }
            $output = [
                'draw' => $this->request->getPost('draw'),
                'recordsTotal' => $this->m_user->countAll(),
                'recordsFiltered' => $this->m_user->countFiltered(),
                'data' => $data
            ];

            echo json_encode($output);
        }
    }

    public function detail()
    {
        $id = $this->request->getVar('id');
        $data = $this->m_user->find($id);

        if (!$data) {
            $response = ['status' => false, 'desc' => 'User Data Not Found!', 'icon' => 'warning', 'title' => 'Warning'];
        } else {
            $response = ['status' => true, 'data' => $data];
        }

        echo json_encode($response);
    }

    public function save()
    {
        $this->validation->setRules([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|valid_email',
            'user_role' => 'required',
        ]);

        if ($this->validation->withRequest($this->request)->run()) {
            $post = $this->request->getVar();
            $object = [
                'name' => strtoupper($post['name']),
                'username' => $post['username'],
                'user_role' => $post['user_role'],
                'email' => $post['email'],
                'password' => password_hash(strtolower($post['username']), PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s')
            ];
            $insert = $this->m_user->insert($object, false);
            if ($insert) {
                return redirect()->back()->with('success', 'Registration Success!');
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

    public function delete()
    {
        $id = $this->request->getVar('id');
        $data = $this->m_user->find($id);

        if ($data) {
            $this->m_user->delete($id);
            $response = ['icon' => 'success', 'title' => 'Success', 'desc' => 'Delete User Success!'];
        } else {
            $response = ['icon' => 'error', 'title' => 'Error', 'desc' => 'Data not found!'];
        }
        echo json_encode($response);
    }

    public function update()
    {
        $this->validation->setRules([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|valid_email',
            'user_role' => 'required',
        ]);
        if ($this->validation->withRequest($this->request)->run()) {
            $post = $this->request->getVar();

            $object = [
                'name' => strtoupper($post['name']),
                'username' => $post['username'],
                'user_role' => $post['user_role'],
                'email' => $post['email'],
                'created_at' => date('Y-m-d H:i:s')
            ];

            $insert = $this->m_user->update($post['id'], $object);
            if ($insert) {
                return redirect()->back()->with('success', 'Update User Data Success!');
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

    public function profil()
    {
        $this->data['title'] = 'My Profil';
        $username = $this->session->username;
        $this->data['role'] = $this->role_m->findAll();
        $builder = $this->m_user->builder();

        $this->data['myProfil'] = $builder->select('users.id, name, username, email, r.role, image, created_at')->join('kategori_user r', 'users.user_role=r.kd_role')->where('username', $username)->get()->getRow();
        echo view('user/profil', $this->data);
    }

    public function profilUpdate()
    {
        $id = $this->request->getVar('id');
        $this->validation->setRules([
            'name' => 'required',
            'email' => 'required|valid_email',
        ]);
        if ($this->validation->withRequest($this->request)->run()) {
            $fileImage_name = $this->request->getVar('old_image');
            if (isset($_FILES) && @$_FILES['image']['error'] != '4') {
                if ($fileImage = $this->request->getFile('image')) {
                    if (!$fileImage->isValid()) {
                        throw new \RuntimeException($fileImage->getErrorString() . '(' . $fileImage->getError() . ')');
                    } else {
                        $fileImage_name = $fileImage->getRandomName();
                        $fileImage->move('public/uploads/user', $fileImage_name);
                    }
                }
            }
            $post = $this->request->getVar();

            $data = [
                'email'  => strtolower($post['email']),
                'name'  => strtoupper($post['name']),
                'image' => $fileImage_name,
            ];

            $update = $this->m_user->update($id, $data);
            if ($update) {
                return redirect()->back()->with('success', 'Update Profil Success!');
            } else {
                return redirect()->back()->with('error', 'Update Profil Fail!');
            }
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
