<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Matakuliah extends Migration
{
    public function up()
    {
        // Tabel matakuliah dibuat sederhana saja
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'kode' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'nama_mk' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'sks' => [
                'type' => 'INT',
                'constraint' => 2
            ],
            'created_at DATETIME NULL',
            'updated_at DATETIME NULL'
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('matakuliah');
    }

    public function down()
    {
        $this->forge->dropTable('matakuliah');
    }
}
