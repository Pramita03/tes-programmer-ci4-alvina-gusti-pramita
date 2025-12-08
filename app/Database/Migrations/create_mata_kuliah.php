<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;


class CreateMataKuliah extends Migration
{
public function up()
{
$this->forge->addField([
'id_mk' => ['type'=>'INT','constraint'=>11,'unsigned'=>true,'auto_increment'=>true],
'kode_mk' => ['type'=>'VARCHAR','constraint'=>20,'null'=>false],
'nama_mk' => ['type'=>'VARCHAR','constraint'=>100,'null'=>false],
'sks' => ['type'=>'INT','constraint'=>3,'null'=>false],
'created_at' => ['type'=>'DATETIME','null'=>true],
'updated_at' => ['type'=>'DATETIME','null'=>true],
]);
$this->forge->addKey('id_mk', true);
$this->forge->createTable('mata_kuliah');
}


public function down()
{
$this->forge->dropTable('mata_kuliah');
}
}
