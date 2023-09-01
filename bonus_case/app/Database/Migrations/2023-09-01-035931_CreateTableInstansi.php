<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableInstansi extends Migration{
    public function up(){
        $this->forge->addField([
            'id_instansi' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            'nama_instansi' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'deskripsi_instansi' => [
                'type' => 'TEXT',
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id_instansi', true);
        $this->forge->createTable('instansi');
    }

    public function down(){
        $this->forge->dropTable('instansi');
    }
}
