<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKrsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_mahasiswa' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'id_matakuliah' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'tahun_akademik' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'semester' => [
                'type' => 'ENUM',
                'constraint' => ['Ganjil', 'Genap']
            ],
            'created_at DATETIME NULL',
            'updated_at DATETIME NULL'
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_mahasiswa', 'mahasiswa', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_matakuliah', 'matakuliah', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('krs');
    }

    public function down()
    {
        $this->forge->dropTable('krs');
    }
}
