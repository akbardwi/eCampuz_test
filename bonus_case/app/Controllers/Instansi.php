<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Instansi extends BaseController{
    public function index(){
        $pengguna = $this->penggunaModel->where('nama_pengguna', $this->session->get('nama_pengguna'))->first();
        $data = [
            'title'         => 'Daftar Instansi',
            'instansi'      => $this->instansiModel->findAll(),
            'user_login'    => $pengguna,
        ];
        return view('instansi/index', $data);
    }

    public function tambah(){
        $pengguna = $this->penggunaModel->where('nama_pengguna', $this->session->get('nama_pengguna'))->first();
        $data = [
            'title'         => 'Tambah Instansi',
            'instansi'      => TRUE,
            'user_login'    => $pengguna,
        ];
        return view('instansi/tambah', $data);
    }
    
    public function simpan(){
        $data = [
            'nama_instansi'          => filter_var($this->request->getPost('nama_instansi'), FILTER_SANITIZE_STRING),
            'deskripsi_instansi'     => filter_var($this->request->getPost('deskripsi_instansi'), FILTER_SANITIZE_STRING),
        ];
        if($this->validation->run($data, 'instansi') == FALSE){
            $this->session->setFlashdata('errors', $this->validation->getErrors());
            return redirect()->to(base_url('instansi/tambah'))->withInput();
        } else {
            $this->instansiModel->insert($data);
            $this->session->setFlashdata('success', 'Instansi berhasil ditambahkan');
            return redirect()->to(base_url('instansi'));
        }
    }

    public function ubah($id_instansi){
        $pengguna = $this->penggunaModel->where('nama_pengguna', $this->session->get('nama_pengguna'))->first();
        $data = [
            'title'         => 'Ubah Instansi',
            'instansi'      => $this->instansiModel->find($id_instansi),
            'user_login'    => $pengguna,
        ];
        return view('instansi/ubah', $data);
    }

    public function perbarui($id_instansi){
        $data = [
            'nama_instansi'          => filter_var($this->request->getPost('nama_instansi'), FILTER_SANITIZE_STRING),
            'deskripsi_instansi'     => filter_var($this->request->getPost('deskripsi_instansi'), FILTER_SANITIZE_STRING),
        ];
        if($this->validation->run($data, 'instansi') == FALSE){
            $this->session->setFlashdata('errors', $this->validation->getErrors());
            return redirect()->to(base_url('instansi/'.$id_instansi.'/ubah'))->withInput();
        } else {
            $this->instansiModel->update($id_instansi, $data);
            $this->session->setFlashdata('success', 'Instansi berhasil diperbarui');
            return redirect()->to(base_url('instansi'));
        }
    }

    public function hapus($id_instansi){
        $this->instansiModel->delete($id_instansi);
        $this->session->setFlashdata('success', 'Instansi berhasil dihapus');
        return redirect()->to(base_url('instansi'));
    }
}
