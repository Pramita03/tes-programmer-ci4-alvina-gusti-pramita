<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    // Nama tabel mengikuti migration
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';

    // Kolom yang boleh diisi
    protected $allowedFields = [
        'nim', 'nama', 'jenis_kelamin', 'email', 'foto'
    ];

    // Aktifkan auto timestamp CI4
    protected $useTimestamps = true;
}
