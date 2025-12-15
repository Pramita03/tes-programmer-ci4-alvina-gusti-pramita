<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    protected $mahasiswa;

    public function __construct()
    {
        $this->mahasiswa = new MahasiswaModel();
    }

    // =========================
    // TAMPIL DATA
    // =========================
    public function index()
    {
        return view('mahasiswa/index', [
            'title' => 'Data Mahasiswa',
            'list'  => $this->mahasiswa->findAll()
        ]);
    }

    // =========================
    // FORM TAMBAH
    // =========================
    public function tambah()
    {
        return view('mahasiswa/form', [
            'title' => 'Tambah Mahasiswa'
        ]);
    }

    // =========================
    // SIMPAN DATA BARU
    // =========================
    public function simpan()
    {
        // Validasi input
        if (!$this->validate([
            'nim'   => 'required|is_unique[mahasiswa.nim]',
            'nama'  => 'required',
            'email' => 'required|valid_email',
            'foto'  => 'permit_empty|is_image[foto]|max_size[foto,2048]'
        ])) {
            // Kembali ke form jika gagal
            return redirect()->back()->withInput();
        }

        // Proses upload foto (jika ada)
        $foto = $this->request->getFile('foto');
        $namaFoto = null;

        if ($foto && $foto->isValid()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/foto_mahasiswa', $namaFoto);
        }

        // Simpan ke database
        $this->mahasiswa->insert([
            'nim'            => $this->request->getPost('nim'),
            'nama'           => $this->request->getPost('nama'),
            'jenis_kelamin'  => $this->request->getPost('jk'),
            'email'          => $this->request->getPost('email'),
            'foto'           => $namaFoto
        ]);

        // Flash message
        session()->setFlashdata('pesan', 'Data mahasiswa berhasil ditambahkan');

        return redirect()->to('/mahasiswa');
    }

    // =========================
    // FORM EDIT
    // =========================
    public function edit($id)
    {
        return view('mahasiswa/form', [
            'title' => 'Edit Mahasiswa',
            'data'  => $this->mahasiswa->find($id)
        ]);
    }

    // =========================
    // UPDATE DATA
    // =========================
    public function update($id)
    {
        // Ambil data lama
        $lama = $this->mahasiswa->find($id);

        // Validasi
        if (!$this->validate([
            'nim'   => 'required',
            'nama'  => 'required',
            'email' => 'required|valid_email',
            'foto'  => 'permit_empty|is_image[foto]|max_size[foto,2048]'
        ])) {
            return redirect()->back()->withInput();
        }

        // Proses foto
        $foto = $this->request->getFile('foto');
        $namaFoto = $lama['foto'];

        if ($foto && $foto->isValid()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/foto_mahasiswa', $namaFoto);
        }

        // Update database
        $this->mahasiswa->update($id, [
            'nim'           => $this->request->getPost('nim'),
            'nama'          => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jk'),
            'email'         => $this->request->getPost('email'),
            'foto'          => $namaFoto
        ]);

        session()->setFlashdata('pesan', 'Data mahasiswa berhasil diubah');
        return redirect()->to('/mahasiswa');
    }

    // =========================
    // HAPUS DATA
    // =========================
    public function hapus($id)
    {
        $this->mahasiswa->delete($id);
        session()->setFlashdata('pesan', 'Data mahasiswa berhasil dihapus');
        return redirect()->to('/mahasiswa');
    }
}
