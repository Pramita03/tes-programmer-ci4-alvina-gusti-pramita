<?php
namespace App\Models;
use CodeIgniter\Model;


class KrsModel extends Model
{
protected $table = 'krs';
protected $primaryKey = 'id_krs';
protected $useTimestamps = true;
protected $allowedFields = ['id_mahasiswa','id_mk','tahun_akademik','semester_krs'];


public function getWithRelations()
{
return $this->select('krs.*, mahasiswa.nim, mahasiswa.nama as mahasiswa_nama, mata_kuliah.kode_mk, mata_kuliah.nama_mk')
->join('mahasiswa','mahasiswa.id_mahasiswa = krs.id_mahasiswa')
->join('mata_kuliah','mata_kuliah.id_mk = krs.id_mk')
->orderBy('krs.created_at','DESC')
->findAll();
}
}
