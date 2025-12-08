<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KrsModel;
use App\Models\MahasiswaModel;
use App\Models\MatakuliahModel;

class KrsController extends BaseController
{
    protected $krs, $mhs, $mk;

    public function __construct()
    {
        $this->krs = new KrsModel();
        $this->mhs = new MahasiswaModel();
        $this->mk  = new MatakuliahModel();
    }

    public function index()
    {
        $data['list'] = $this->krs->getLengkap();
        return view('krs/index', $data);
    }

    public function tambah()
    {
        $data['mahasiswa'] = $this->mhs->findAll();
        $data['matakuliah'] = $this->mk->findAll();
        return view('krs/form', $data);
    }

    public function simpan()
    {
        $this->krs->save([
            'id_mahasiswa' => $this->request->getPost('mhs'),
            'id_matakuliah' => $this->request->getPost('mk'),
            'tahun_akademik' => $this->request->getPost('tahun'),
            'semester' => $this->request->getPost('semester')
        ]);

        return redirect()->to('/krs')->with('pesan', 'KRS berhasil ditambahkan');
    }

    public function hapus($id)
    {
        $this->krs->delete($id);

        return redirect()->to('/krs')->with('pesan', 'Data KRS dihapus');
    }
}
