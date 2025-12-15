<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KrsModel;
use App\Models\MahasiswaModel;
use App\Models\MatakuliahModel;

class Krs extends BaseController
{
    protected $krs;
    protected $mahasiswa;
    protected $matakuliah;

    public function __construct()
    {
        $this->krs        = new KrsModel();
        $this->mahasiswa  = new MahasiswaModel();
        $this->matakuliah = new MatakuliahModel();
    }

    // =========================
    // TAMPIL DATA KRS
    // =========================
    public function index()
    {
        // Ambil data KRS + relasi mahasiswa & matakuliah
        $list = $this->krs
            ->select('krs.id, mahasiswa.nama AS nama_mahasiswa, matakuliah.nama_mk, krs.tahun_akademik, krs.semester')
            ->join('mahasiswa', 'mahasiswa.id = krs.mahasiswa_id')
            ->join('matakuliah', 'matakuliah.id = krs.matakuliah_id')
            ->findAll();

        return view('krs/index', [
            'title' => 'Data KRS',
            'list'  => $list
        ]);
    }

    // =========================
    // FORM TAMBAH KRS
    // =========================
    public function tambah()
    {
        return view('krs/form', [
            'title'      => 'Tambah KRS',
            'mahasiswa'  => $this->mahasiswa->findAll(),
            'matakuliah' => $this->matakuliah->findAll()
        ]);
    }

    // =========================
    // SIMPAN DATA KRS
    // =========================
    public function simpan()
    {
        // Validasi input
        if (!$this->validate([
            'mhs'      => 'required',
            'mk'       => 'required',
            'tahun'    => 'required',
            'semester' => 'required'
        ])) {
            return redirect()->back()->withInput();
        }

        // Simpan ke database
        $this->krs->insert([
            'mahasiswa_id'  => $this->request->getPost('mhs'),
            'matakuliah_id' => $this->request->getPost('mk'),
            'tahun_akademik'=> $this->request->getPost('tahun'),
            'semester'      => $this->request->getPost('semester')
        ]);

        session()->setFlashdata('pesan', 'Data KRS berhasil ditambahkan');
        return redirect()->to('/krs');
    }

    // =========================
    // HAPUS DATA KRS
    // =========================
    public function hapus($id)
    {
        $this->krs->delete($id);
        session()->setFlashdata('pesan', 'Data KRS berhasil dihapus');
        return redirect()->to('/krs');
    }
}
