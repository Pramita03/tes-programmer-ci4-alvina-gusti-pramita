<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MatakuliahModel;

class Matakuliah extends BaseController
{
    protected $matakuliah;

    public function __construct()
    {
        $this->matakuliah = new MatakuliahModel();
    }

    // =========================
    // TAMPIL DATA
    // =========================
    public function index()
    {
        return view('matakuliah/index', [
            'title' => 'Data Mata Kuliah',
            'list'  => $this->matakuliah->findAll()
        ]);
    }

    // =========================
    // FORM TAMBAH
    // =========================
    public function tambah()
    {
        return view('matakuliah/form', [
            'title' => 'Tambah Mata Kuliah'
        ]);
    }

    // =========================
    // SIMPAN DATA BARU
    // =========================
    public function simpan()
    {
        // Validasi input
        if (!$this->validate([
            'kode'    => 'required|is_unique[matakuliah.kode]',
            'nama_mk' => 'required',
            'sks'     => 'required|integer'
        ])) {
            return redirect()->back()->withInput();
        }

        // Simpan ke database
        $this->matakuliah->insert([
            'kode'    => $this->request->getPost('kode'),
            'nama_mk' => $this->request->getPost('nama_mk'),
            'sks'     => $this->request->getPost('sks')
        ]);

        session()->setFlashdata('pesan', 'Data mata kuliah berhasil ditambahkan');
        return redirect()->to('/matakuliah');
    }

    // =========================
    // FORM EDIT
    // =========================
    public function edit($id)
    {
        return view('matakuliah/form', [
            'title' => 'Edit Mata Kuliah',
            'data'  => $this->matakuliah->find($id)
        ]);
    }

    // =========================
    // UPDATE DATA
    // =========================
    public function update($id)
    {
        // Validasi input
        if (!$this->validate([
            'kode'    => 'required',
            'nama_mk' => 'required',
            'sks'     => 'required|integer'
        ])) {
            return redirect()->back()->withInput();
        }

        // Update data
        $this->matakuliah->update($id, [
            'kode'    => $this->request->getPost('kode'),
            'nama_mk' => $this->request->getPost('nama_mk'),
            'sks'     => $this->request->getPost('sks')
        ]);

        session()->setFlashdata('pesan', 'Data mata kuliah berhasil diubah');
        return redirect()->to('/matakuliah');
    }

    // =========================
    // HAPUS DATA
    // =========================
    public function hapus($id)
    {
        $this->matakuliah->delete($id);
        session()->setFlashdata('pesan', 'Data mata kuliah berhasil dihapus');
        return redirect()->to('/matakuliah');
    }
}
