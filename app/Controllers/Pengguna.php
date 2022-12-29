<?php

namespace App\Controllers;

use Config\Validation;

class Pengguna extends BaseController
{
    function __construct()
    {
        $this->model = new \App\Models\ModelPengguna();
    }

    public function hapus($id)
    {
        $this->model->delete($id);
        return redirect()->to('pengguna');
    }

    public function edit($id)
    {
        return json_encode($this->model->find($id));
    }

    public function simpan()
    {

        $validasi = \Config\Services::validation();
        $aturan = [
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk field {field} adalah 4 karakter'
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|min_length[4]|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk field {field} adalah 4 karakter',
                    'valid_email' => 'Email yang anda masukan tidak valid'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk field {field} adalah 4 karakter'
                ]
            ],
            'bagian' => [
                'label' => 'Bagian',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'

                ]
            ],
        ];

        $validasi->setRules($aturan);
        if ($validasi->withRequest($this->request)->run()) {

            $id = $this->request->getPost('id');
            $nama = $this->request->getPost('nama');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $bagian = $this->request->getPost('bagian');

            $data = [
                'id' => $id,
                'nama' => $nama,
                'email' => $email,
                'password' => $password,
                'bagian' => $bagian
            ];

            $this->model->save($data);

            $hasil['sukses'] = "Berhasil";
            $hasil['error'] = true;
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validasi->listErrors();
        }


        return json_encode($hasil);
    }

    public function index()
    {

        $jumlahBaris = 2;

        $katakunci = $this->request->getGet('katakunci');
        if ($katakunci) {
            $pencarian = $this->model->cari($katakunci);
        } else {
            $pencarian = $this->model;
        }
        $data['katakunci'] = $katakunci;
        $data['dataPengguna'] = $pencarian->orderBy('id', 'desc')->paginate($jumlahBaris);
        $data['pager'] = $this->model->pager;

        $data['nomor'] = ($this->request->getVar('page') == 1) ? '0' : $this->request->getVar('page');
        return view('pengguna_view', $data);
    }
}
