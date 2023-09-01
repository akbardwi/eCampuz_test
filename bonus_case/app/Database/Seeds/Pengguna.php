<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Pengguna extends Seeder{
    public function run(){
        $data = [
            [
                'nama_pengguna' => 'admin',
                'email_pengguna' => 'admin@email.com',
                'password_pengguna' => password_hash('admin', PASSWORD_DEFAULT)
            ]
        ];
        $this->db->table('pengguna')->insertBatch($data);
    }
}
