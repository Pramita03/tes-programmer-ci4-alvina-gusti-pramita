<?php

namespace App\Models;

use CodeIgniter\Model;

class KrsModel extends Model
{
    protected $table = 'krs';
    protected $primaryKey = 'id';

    // Field yang boleh diisi
    protected $allowedFields = [
        'mahasiswa_id',
        'matakuliah_id',
        'tahun_akademik',
        'semester'
    ];

    protected $useTimestamps = true;

    // =========================
    // AMBIL DATA KRS + RELASI
    // (opsional, nilai plus)
    // =========================
    public function getLengkap()
    {
        return $this->select(
                'krs.id,
                 mahasiswa.nama AS nama_mahasiswa,
                 matakuliah.nama_mk,
                 krs.tahun_akademik,
                 krs.semester'
            )
            ->join('mahasiswa', 'mahasiswa.id = krs.mahasiswa_id')
            ->join('matakuliah', 'matakuliah.id = krs.matakuliah_id')
            ->findAll();
    }
}
