<?php
namespace App\Models;
use CodeIgniter\Model;


class MataKuliahModel extends Model
{
protected $table = 'mata_kuliah';
protected $primaryKey = 'id_mk';
protected $useTimestamps = true;
protected $allowedFields = ['kode_mk','nama_mk','sks'];
}
