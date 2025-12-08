<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;

class MahasiswaController extends BaseController
{
    protected $mhs;

    public function __construct()
    {
        // Inisialisasi model supaya tidak berulang
        $this->mhs = new MahasiswaModel();
    }

    public function index()
    {
        // Ambil seluruh data mahasiswa
        $data['list'] = $this->mhs->orderBy('id', 'DESC')->findAll();

        return view('mahasiswa/index', $data);
    }

    public function tambah()
    {
        // Form tambah data
        return view('mahasiswa/form');
    }

    public function simpan()
    {
        // Ambil file foto
        $foto = $this->request->getFile('foto');
        $namaFoto = null;

        // Jika ada foto diupload
        if ($foto && $foto->isValid()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/foto_mahasiswa', $namaFoto);
        }

        // Simpan data ke database
        $this->mhs->save([
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jk'),
            'email' => $this->request->getPost('email'),
            'foto' => $namaFoto
        ]);

        return redirect()->to('/mahasiswa')->with('pesan', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['data'] = $this->mhs->find($id);
        return view('mahasiswa/form', $data);
    }

    public function update($id)
    {
        $foto = $this->request->getFile('foto');
        $namaFoto = $this->request->getPost('foto_lama'); // untuk mempertahankan foto lama

        // Jika upload baru
        if ($foto && $foto->isValid()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/foto_mahasiswa', $namaFoto);
        }

        $this->mhs->update($id, [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jk'),
            'email' => $this->request->getPost('email'),
            'foto' => $namaFoto
        ]);

        return redirect()->to('/mahasiswa')->with('pesan', 'Data diperbarui');
    }

    public function hapus($id)
    {
        $this->mhs->delete($id);
        return redirect()->to('/mahasiswa')->with('pesan', 'Data dihapus');
    }
}
