<?php

namespace App\Models;

use CodeIgniter\Model;

class KrsModel extends Model
{
    protected $table = 'krs';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_mahasiswa', 'id_matakuliah',
        'tahun_akademik', 'semester'
    ];
    protected $useTimestamps = true;

    // Untuk menampilkan daftar KRS lengkap dengan nama mahasiswa dan nama MK
    public function getLengkap()
    {
        return $this->select('krs.*, mahasiswa.nama AS nama_mahasiswa, matakuliah.nama_mk')
            ->join('mahasiswa', 'mahasiswa.id = krs.id_mahasiswa')
            ->join('matakuliah', 'matakuliah.id = krs.id_matakuliah')
            ->findAll();
    }
}
