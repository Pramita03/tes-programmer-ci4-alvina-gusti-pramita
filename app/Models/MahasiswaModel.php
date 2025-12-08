<?php
namespace App\Models;


use CodeIgniter\Model;


class MahasiswaModel extends Model
{
protected $table = 'mahasiswa';
protected $primaryKey = 'id_mahasiswa';
protected $useTimestamps = true;
protected $allowedFields = ['nim','nama','jenis_kelamin','tempat_lahir','tanggal_lahir','alamat','no_hp','email','foto'];
}
