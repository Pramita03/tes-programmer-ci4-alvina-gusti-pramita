<?php

namespace App\Models;

use CodeIgniter\Model;

class MatakuliahModel extends Model
{
    protected $table = 'matakuliah';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'kode', 'nama_mk', 'sks'
    ];

    protected $useTimestamps = true;
}
