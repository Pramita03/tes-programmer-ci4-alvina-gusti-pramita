<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Krs extends Migration
{
    public function up()
    {
        // Tabel KRS untuk menghubungkan mahasiswa dengan mata kuliah
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
                'unsigned' => true
            ],
            'id_mahasiswa' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'id_matakuliah' => [
                'type' => 'INT',
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

        // Relasi antar tabel supaya rapi dan aman
        $this->forge->addForeignKey('id_mahasiswa', 'mahasiswa', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_matakuliah', 'matakuliah', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('krs');
    }

    public function down()
    {
        $this->forge->dropTable('krs');
    }
}
