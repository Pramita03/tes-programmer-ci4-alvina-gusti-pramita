<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;


class CreateKrs extends Migration
{
public function up()
{
$this->forge->addField([
'id_krs' => ['type'=>'INT','constraint'=>11,'unsigned'=>true,'auto_increment'=>true],
'id_mahasiswa' => ['type'=>'INT','constraint'=>11,'unsigned'=>true,'null'=>false],
'id_mk' => ['type'=>'INT','constraint'=>11,'unsigned'=>true,'null'=>false],
'tahun_akademik' => ['type'=>'VARCHAR','constraint'=>20,'null'=>false],
'semester_krs' => ['type'=>'ENUM','constraint'=>"'Ganjil','Genap'",'null'=>false],
'created_at' => ['type'=>'DATETIME','null'=>true],
'updated_at' => ['type'=>'DATETIME','null'=>true],
]);
$this->forge->addKey('id_krs', true);
$this->forge->addForeignKey('id_mahasiswa','mahasiswa','id_mahasiswa','CASCADE','CASCADE');
$this->forge->addForeignKey('id_mk','mata_kuliah','id_mk','CASCADE','CASCADE');
$this->forge->createTable('krs');
}


public function down()
{
$this->forge->dropTable('krs');
}
}
