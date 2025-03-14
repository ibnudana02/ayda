<?php

namespace App\Controllers;

use App\Libraries\Secure;

class Transaction extends BaseController
{

    public function __construct()
    {
        helper(['rest', 'custom']);
        $this->scr = new Secure();
    }

    private function _singlerules()
    {
        $this->validation->setRule('tgltrn', 'Tgl Transaksi', 'required', ['required' => '{field} tidak boleh kosong!']);
        $this->validation->setRule('drak', 'Debet Rekening Kantor', 'required', ['required' => '{field} tidak boleh kosong!']);
        $this->validation->setRule('drtype', 'Jenis Debet Rekening', 'required', ['required' => '{field} tidak boleh kosong!']);
        $this->validation->setRule('dnorek', 'Debet Rekening', 'required', ['required' => '{field} tidak boleh kosong!']);
        $this->validation->setRule('dnama', 'Debet Nama Rekening', 'required', ['required' => '{field} tidak boleh kosong!']);
        $this->validation->setRule('nominal', 'Nominal Transaksi', 'required', ['required' => '{field} tidak boleh kosong!']);
        $this->validation->setRule('crtype', 'Jenis Kredit Rekening', 'required', ['required' => '{field} tidak boleh kosong!']);
        $this->validation->setRule('cnorek', 'Kredit Rekening', 'required', ['required' => '{field} tidak boleh kosong!']);
        $this->validation->setRule('cnama', 'Kredit Nama Rekening', 'required', ['required' => '{field} tidak boleh kosong!']);
        $this->validation->setRule('ket', 'Keterangan Transaksi', 'required', ['required' => '{field} tidak boleh kosong!']);
    }

    private function _rules()
    {
        $this->validation->setRules(
            [
                'tgltrn' => [
                    'label'  => 'Tgl Transaksi',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                    ],
                ],
                'drtype.*' => [
                    'label'  => 'Jenis Debet Rekening',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                    ],
                ],
                'dnorek.*' => [
                    'label'  => 'Debet Rekening',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                    ],
                ],
                'dnama.*' => [
                    'label'  => 'Debet Nama Rekening',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                    ],
                ],
                'nominal_dr.*' => [
                    'label'  => 'Nominal Debet Rekening',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                    ],
                ],
                'crtype.*' => [
                    'label'  => 'Jenis Kredit Rekening',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                    ],
                ],
                'cnorek.*' => [
                    'label'  => 'Kredit Rekening',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                    ],
                ],
                'cnama.*' => [
                    'label'  => 'Kredit Nama Rekening',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                    ],
                ],
                'nominal_cr.*' => [
                    'label'  => 'Nominal Kredit Rekening',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                    ],
                ],
                'ket' => [
                    'label'  => 'Keterangan Transaksi',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                    ],
                ],
            ]
        );
    }

    public function index()
    {
        $this->data['title'] = 'Single Transaction';
        $this->data['kantor'] = $this->m_kantor->findAll();
        if ($this->request->is('get')) {
            echo view('transaction/input', $this->data);
        } elseif ($this->request->is('post')) {
            $this->_singlerules();
            if ($this->request->isAJAX()) {
                $validasi = $this->validasi();
                if ($validasi['status']) {
                    $insert = $this->insertData();
                    if ($insert['status']) {
                        $response = ['status' => true, 'data' => $this->scr->enc($insert['id']), 'title' => 'Success!', 'icon' => 'success', 'desc' => 'Create Transaction Success!'];
                    } else {
                        $response = ['status' => false, 'data' => null, 'title' => 'Error!', 'icon' => 'error', 'desc' => 'Create Transaction Fail!'];
                    }
                    echo json_encode($response);
                } else {
                    $response = [
                        'title' => 'Error Validation!',
                        'icon' => 'warning',
                        'desc' => $validasi['data'],
                        'status' => false
                    ];
                    echo json_encode($response);
                }
            } else {
                $validasi = $this->validasi();
                if ($validasi['status']) {
                    $insert = $this->insertData();
                    if ($insert['status']) {
                        return redirect()->back()->with('success', 'Create Transaction Success!');
                    } else {
                        return redirect()->back()->with('error', 'Create Transaction Fail!');
                    }
                } else {
                    return redirect()->back()->with('error', $validasi['data']);
                }
            }
        }
    }

    public function multiple_trx()
    {
        $this->data['title'] = 'Multiple Transaction';
        $this->data['user_loc'] = $this->data['user']['user_loc'];

        if ($this->request->is('get')) {
            echo view('transaction/input_multi', $this->data);
        } elseif ($this->request->is('post')) {
            $this->_rules();
            if ($this->request->isAJAX()) {
                $validasi = $this->validasi();
                if ($validasi['status']) {
                    $insert = $this->insertMultiple();
                    if ($insert['status']) {
                        $response = ['status' => true, 'data' => $this->scr->enc($insert['id']), 'title' => 'Success!', 'icon' => 'success', 'desc' => 'Create Transaction Success!'];
                    } else {
                        $response = ['status' => false, 'data' => null, 'title' => 'Error!', 'icon' => 'error', 'desc' => 'Create Transaction Fail!'];
                    }
                    echo json_encode($response);
                } else {
                    $response = [
                        'title' => 'Error Validation!',
                        'icon' => 'warning',
                        'desc' => $validasi['data'],
                        'status' => false
                    ];
                    echo json_encode($response);
                }
            } else {
                $validasi = $this->validasi();
                if ($validasi['status']) {
                    $insert = $this->insertMultiple();
                    if ($insert['status']) {
                        return redirect()->back()->with('success', 'Create Transaction Success!');
                    } else {
                        return redirect()->back()->with('error', 'Create Transaction Fail!');
                    }
                } else {
                    return redirect()->back()->with('error', $validasi['data']);
                }
            }
        }
    }

    public function single_bd()
    {
        $this->data['title'] = 'Single Transaction Backdate';
        $this->data['kantor'] = $this->m_kantor->findAll();
        if ($this->request->is('get')) {
            echo view('transaction/single_bd', $this->data);
        } elseif ($this->request->is('post')) {
            $this->_singlerules();
            if ($this->request->isAJAX()) {
                $validasi = $this->validasi();
                if ($validasi['status']) {
                    $insert = $this->insertData();
                    if ($insert['status']) {
                        $response = ['status' => true, 'data' => $this->scr->enc($insert['id']), 'title' => 'Success!', 'icon' => 'success', 'desc' => 'Create Transaction Success!'];
                    } else {
                        $response = ['status' => false, 'data' => null, 'title' => 'Error!', 'icon' => 'error', 'desc' => 'Create Transaction Fail!'];
                    }
                    echo json_encode($response);
                } else {
                    $response = [
                        'title' => 'Error Validation!',
                        'icon' => 'warning',
                        'desc' => $validasi['data'],
                        'status' => false
                    ];
                    echo json_encode($response);
                }
            } else {
                $validasi = $this->validasi();
                if ($validasi['status']) {
                    $insert = $this->insertData();
                    if ($insert['status']) {
                        return redirect()->back()->with('success', 'Create Backdate Transaction Success!');
                    } else {
                        return redirect()->back()->with('error', 'Create Backdate Transaction Fail!');
                    }
                } else {
                    return redirect()->back()->with('error', $validasi['data']);
                }
            }
        }
    }

    public function multiple_bd()
    {
        $this->data['title'] = 'Multiple Transaction Backdate';
        $this->data['user_loc'] = $this->data['user']['user_loc'];

        if ($this->request->is('get')) {
            echo view('transaction/input_multi_bd', $this->data);
        } elseif ($this->request->is('post')) {
            $this->_rules();
            if ($this->request->isAJAX()) {
                $validasi = $this->validasi();
                if ($validasi['status']) {
                    $insert = $this->insertMultiple();
                    if ($insert['status']) {
                        $response = ['status' => true, 'data' => $this->scr->enc($insert['id']), 'title' => 'Success!', 'icon' => 'success', 'desc' => 'Create Transaction Success!'];
                    } else {
                        $response = ['status' => false, 'data' => null, 'title' => 'Error!', 'icon' => 'error', 'desc' => 'Create Transaction Fail!'];
                    }
                    echo json_encode($response);
                } else {
                    $response = [
                        'title' => 'Error Validation!',
                        'icon' => 'warning',
                        'desc' => $validasi['data'],
                        'status' => false
                    ];
                    echo json_encode($response);
                }
            } else {
                $validasi = $this->validasi();
                if ($validasi['status']) {
                    $insert = $this->insertMultiple();
                    if ($insert['status']) {
                        return redirect()->back()->with('success', 'Create Transaction Success!');
                    } else {
                        return redirect()->back()->with('error', 'Create Transaction Fail!');
                    }
                } else {
                    return redirect()->back()->with('error', $validasi['data']);
                }
            }
        }
    }

    public function validasi()
    {
        if (!$this->validation->withRequest($this->request)->run()) {
            $errors = array_values($this->validation->getErrors());
            $error = '';
            for ($i = 0; $i < count($errors); $i++) {
                $error .= $errors[$i] . "</br>";
            }
            $response = ['status' => false, 'data' => $error];
        } else {
            $response = ['status' => true, 'data' => null];
        }
        return $response;
    }

    public function insertData()
    {
        $post = $this->request->getVar();
        $object = [
            'tgltrn' => date('Y-m-d H:i:s', strtotime($post['tgltrn'])),
            'drak' => $post['drak'],
            'drtype' => $post['drtype'],
            'dnama' => $post['dnama'],
            'dnorek' => $post['dnorek'],
            'crak' => $post['crak'],
            'crtype' => $post['crtype'],
            'cnama' => $post['cnama'],
            'cnorek' => $post['cnorek'],
            'nominal' => str_replace(',', '', $post['nominal']),
            'ket' => strtoupper($post['ket']),
            'created_by' => $this->session->get('username')
        ];

        $insert = $this->m_trans->insert($object, false);
        if ($insert) {
            $id = $this->m_trans->getInsertID();
            $response = ['status' => true, 'id' => $id];
        } else {
            $response = ['status' => false];
        }
        return $response;
    }

    public function insertMultiple()
    {
        $post = $this->request->getVar();
        $object = [
            'tgltrn' => date('Y-m-d', strtotime($post['tgltrn'])),
            'multi' => $post['multi'],
            'drtype' => $this->parsing_field($post['drtype']),
            'dnama' => $this->parsing_field($post['dnama']),
            'dnorek' => $this->parsing_field($post['dnorek']),
            'nominal_dr' => str_replace(',', '', $this->parsing_field($post['nominal_dr'])),
            'terbilang' => terbilangdesimal($this->sum_nom($post['nominal_dr'])),
            'crtype' => $this->parsing_field($post['crtype']),
            'cnama' => $this->parsing_field($post['cnama']),
            'cnorek' => $this->parsing_field($post['cnorek']),
            'nominal_cr' => str_replace(',', '', $this->parsing_field($post['nominal_cr'])),
            'ket' => strtoupper($post['ket']),
            'created_by' => $this->session->get('username')
        ];

        $insert = $this->m_trans->insert($object, false);
        if ($insert) {
            $id = $this->m_trans->getInsertID();
            $response = ['status' => true, 'id' => $id];
        } else {
            $response = ['status' => false];
        }
        return $response;
    }

    private function parsing_field($data)
    {
        $field = null;
        if (is_array($data)) {
            for ($i = 0; $i < count($data); $i++) {
                $field .= trim($data[$i]) . ";";
            }
        } else {
            $field = $data;
        }
        return $field;
    }

    private function sum_nom($data)
    {
        $field = 0;
        for ($i = 0; $i < count($data); $i++) {
            $field += (float) $data[$i];
        }
        return $field;
    }

    public function history()
    {
        $this->data['title'] = 'History Voucher';
        $this->data['trx'] = $this->m_trans->findAll();
        $this->data['kantor'] = $this->m_kantor->findAll();
        echo view('transaction/list', $this->data);
    }

    public function list()
    {
        if ($this->request->is('POST')) {
            $username = $this->session->username;
            $lists = $this->m_trans->getDatatables($username);

            $data = [];
            $no = $this->request->getVar('start');

            foreach ($lists as $key => $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = date("d/m/y", strtotime($list->tgltrn));
                $row[] = substr($list->dnama, 0, 30);
                $row[] = substr($list->cnama, 0, 30);
                if ($list->multi) {
                    $nom_dr = 0;
                    $denom = explode(';', $list->nominal_dr);
                    for ($i = 0; $i < count($denom); $i++) {
                        $nom_dr += (float) $denom[$i];
                    }
                }
                $row[] = ($list->multi) ? nominal($nom_dr) : nominal($list->nominal);
                $row[] = substr($list->ket, 0, 30);
                $row[] = $list->created_at;
                $row[] = '<div class="btn-group" role="group" aria-label="Basic example">
                            <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-edit" data="' . $this->scr->enc($list->id) . '"><i class="fas fa-pencil-alt"></i></a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-danger btn-hapus" data="' . $this->scr->enc($list->id) . '"><i class="fas fa-trash"></i></i></a>
                            <a href="' . base_url('transaction/print/' . $this->scr->enc($list->id)) . '" target="_cetak" class="btn btn-sm btn-warning" data="' . $list->id . '"><i class="fas fa-print"></i></i></a>
                        </div>';
                $data[] = $row;
            }
            $output = [
                'draw' => $this->request->getPost('draw'),
                'recordsTotal' => $this->m_trans->countAll($username),
                'recordsFiltered' => $this->m_trans->countFiltered($username),
                'data' => $data
            ];

            echo json_encode($output);
        }
    }

    public function hapus()
    {
        $id = $this->scr->dec($this->request->getVar('id'));
        $data = $this->m_trans->find($id);
        if ($data) {
            $delete = $this->m_trans->delete($data['id']);
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
        // $id = $this->request->getVar('id');
        $id = $this->scr->dec($this->request->getVar('id'));
        $data = $this->m_trans->find($id);
        if (!$data) {
            $response = ['status' => false, 'icon' => 'error', 'title' => 'Error', 'desc' => 'Error occured!'];
        } else {
            $response = ['status' => true, 'data' => $data, 'id' => $this->scr->enc($id)];
        }
        echo json_encode($response);
    }

    public function update()
    {
        $id = $this->scr->dec($this->request->getVar('id'));
        $this->_rules();
        if (!$this->validation->withRequest($this->request)->run()) {
            $errors = array_values($this->validation->getErrors());
            $error = '';
            for ($i = 0; $i < count($errors); $i++) {
                $error .= $errors[$i] . "</br>";
            }
            return redirect()->back()->withInput()->with('error', $error);
        } else {
            $post = $this->request->getVar();
            $object = [
                'tgltrn' => date('Y-m-d H:i:s', strtotime($post['tgltrn'])),
                'drtype' => $post['drtype'],
                'dnama' => $post['dnama'],
                'dnorek' => $post['dnorek'],
                'crtype' => $post['crtype'],
                'cnama' => $post['cnama'],
                'cnorek' => $post['cnorek'],
                'nominal' => $post['nominal'],
                'ket' => strtoupper($post['ket']),
                'updated_by' => $this->session->get('username')
            ];

            $update = $this->m_trans->update($id, $object);
            if ($update) {
                return redirect()->back()->with('success', 'Correction success!');
            } else {
                return redirect()->back()->withInput()->with('error', 'Correction fail!');
            }
        }
    }

    public function print($id)
    {
        $this->response->setContentType('application/pdf');
        $this->data['data'] = $this->m_trans->find($this->scr->dec($id));
        if ($this->data['data']['multi'] > 0) {
            return view('printout/multiple', $this->data);
        } else {
            return view('printout/single', $this->data);
        }
    }

    public function search($table)
    {
        $rest = $this->data['app']['api_url'];
        $nama = $this->request->getVar('q');
        $api_url = $rest . "transaction/$table";
        $rest = akses_api('POST', $api_url, $nama);

        $hasil = json_decode($rest);
        echo json_encode($hasil->data);
    }
}
