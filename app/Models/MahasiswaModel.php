<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    // =========================
    // KONFIGURASI TABEL
    // =========================
    protected $table      = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    // Kolom yang boleh diisi (mass assignment)
    protected $allowedFields = [
        'nim',
        'nama',
        'jenis_kelamin',
        'email',
        'foto'
    ];

    // Aktifkan created_at & updated_at
    protected $useTimestamps = true;

    // =========================
    // AMBIL DATA MAHASISWA
    // (opsional, nilai plus)
    // =========================
    public function getAll()
    {
        return $this->orderBy('nama', 'ASC')->findAll();
    }
}
