<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController{
    public function index(){
        return view('auth/login');
    }

    public function login(){
        $data = [
            'username' => filter_var($this->request->getPost('username'), FILTER_SANITIZE_STRING),
            'password' => filter_var($this->request->getPost('password'), FILTER_SANITIZE_STRING),
        ];
        if($this->validation->run($data, 'login') == FALSE){
            $this->session->setFlashdata('errors', $this->validation->getErrors());
            return redirect()->to(base_url('login'))->withInput();
        } else {
            $user = $this->penggunaModel->where('nama_pengguna', $data['username'])->first();
            if($user){
                if(password_verify($data['password'], $user['password_pengguna'])){
                    $this->session->set('nama_pengguna', $user['nama_pengguna']);
                    return redirect()->to(base_url('instansi'));
                } else {
                    $this->session->setFlashdata('error', 'Password salah');
                    return redirect()->to(base_url('login'))->withInput();
                }
            } else {
                $this->session->setFlashdata('error', 'Username tidak ditemukan');
                return redirect()->to(base_url('login'))->withInput();
            }
        }
    }

    public function logout(){
        $this->session->destroy();
        return redirect()->to(base_url('login'));
    }
}
