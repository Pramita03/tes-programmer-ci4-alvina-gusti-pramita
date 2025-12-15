<?php

namespace App\Models;

use CodeIgniter\Model;

class MatakuliahModel extends Model
{
    // =========================
    // KONFIGURASI TABEL
    // =========================
    protected $table      = 'matakuliah';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    // Kolom yang boleh diisi
    protected $allowedFields = [
        'kode',
        'nama_mk',
        'sks'
    ];

    // Aktifkan created_at & updated_at
    protected $useTimestamps = true;

    // =========================
    // AMBIL DATA MATA KULIAH
    // (opsional, nilai plus)
    // =========================
    public function getAll()
    {
        return $this->orderBy('nama_mk', 'ASC')->findAll();
    }
}
