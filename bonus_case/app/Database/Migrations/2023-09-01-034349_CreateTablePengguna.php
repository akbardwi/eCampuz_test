<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePengguna extends Migration{
    public function up(){
        $this->forge->addField([
            'id_pengguna' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            'nama_pengguna' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'email_pengguna' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'password_pengguna' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id_pengguna', true);
        $this->forge->createTable('pengguna');
    }

    public function down(){
        $this->forge->dropTable('pengguna');
    }
}
