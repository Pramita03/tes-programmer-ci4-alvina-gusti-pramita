<?php
namespace App\Database\Migrations;


use CodeIgniter\Database\Migration;


class CreateMahasiswa extends Migration
{
public function up()
{
$this->forge->addField([
'id_mahasiswa' => ['type'=>'INT','constraint'=>11,'unsigned'=>true,'auto_increment'=>true],
'nim' => ['type'=>'VARCHAR','constraint'=>20,'null'=>false],
'nama' => ['type'=>'VARCHAR','constraint'=>100,'null'=>false],
'jenis_kelamin' => ['type'=>'ENUM','constraint'=>"'L','P'",'null'=>false],
'tempat_lahir' => ['type'=>'VARCHAR','constraint'=>100,'null'=>true],
'tanggal_lahir' => ['type'=>'DATE','null'=>true],
'alamat' => ['type'=>'TEXT','null'=>true],
'no_hp' => ['type'=>'VARCHAR','constraint'=>20,'null'=>true],
'email' => ['type'=>'VARCHAR','constraint'=>100,'null'=>true],
'foto' => ['type'=>'VARCHAR','constraint'=>255,'null'=>true],
'created_at' => ['type'=>'DATETIME','null'=>true],
'updated_at' => ['type'=>'DATETIME','null'=>true],
]);
$this->forge->addKey('id_mahasiswa', true);
$this->forge->addKey('nim');
$this->forge->createTable('mahasiswa');
}


public function down()
{
$this->forge->dropTable('mahasiswa');
}
}
