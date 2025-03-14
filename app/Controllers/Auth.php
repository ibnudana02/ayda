<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        if ($this->session->has('logged_in') && $this->session->has('username')) {
            return redirect()->to('/dashboard');
        }
        $this->data['title'] = "Login";

        helper(['form']);
        // echo view('auth/login', $this->data);
        echo view('auth/index', $this->data);
    }

    public function login()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $this->m_user->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id'       => $data['id'],
                    'name'     => $data['name'],
                    'username'    => $data['username'],
                    'role'  => $data['user_role'],
                    'logged_in'     => TRUE
                ];
                $this->session->set($ses_data);
                return redirect()->to('admin/dashboard')->with('success', 'Login Success!');
            } else {
                $this->session->setFlashdata('msg', 'Password salah!');
                return redirect()->to('admin');
            }
        } else {
            $this->session->setFlashdata('msg', 'Pengguna tidak ditemukan!');
            return redirect()->to('admin');
        }
    }

    public function logout()
    {
        $current_session = ['id', 'name', 'username', 'role', 'logged_in'];
        $this->session->remove($current_session);
        return redirect()->to('admin')->with('msg', 'Logout Success!');
    }

    public function dashboard()
    {
        $this->data['title'] = 'Dashboard';
        // $this->data['object'] = [
        //     'user' => ['count' => count($this->m_user->findAll()), 'title' => 'Users', 'color' => 'bg-info', 'icon' => 'fas fa-user-friends', 'link' => 'users'],
        //     'trx' => ['count' => count($this->m_trans->findAll()), 'title' => 'Transactions', 'color' => 'bg-warning', 'icon' => 'fas fa-hand-holding-usd', 'link' => 'transaction/'],
        // ];
        echo view('auth/dashboard', $this->data);
    }
}
