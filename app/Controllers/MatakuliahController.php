<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MatakuliahModel;

class MatakuliahController extends BaseController
{
    protected $mk;

    public function __construct()
    {
        $this->mk = new MatakuliahModel();
    }

    public function index()
    {
        $data['list'] = $this->mk->findAll();
        return view('matakuliah/index', $data);
    }

    public function tambah()
    {
        return view('matakuliah/form');
    }

    public function simpan()
    {
        $this->mk->save([
            'kode' => $this->request->getPost('kode'),
            'nama_mk' => $this->request->getPost('nama_mk'),
            'sks' => $this->request->getPost('sks')
        ]);

        return redirect()->to('/matakuliah')->with('pesan', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['data'] = $this->mk->find($id);
        return view('matakuliah/form', $data);
    }

    public function update($id)
    {
        $this->mk->update($id, [
            'kode' => $this->request->getPost('kode'),
            'nama_mk' => $this->request->getPost('nama_mk'),
            'sks' => $this->request->getPost('sks')
        ]);

        return redirect()->to('/matakuliah')->with('pesan', 'Data berhasil diupdate');
    }

    public function hapus($id)
    {
        $this->mk->delete($id);
        return redirect()->to('/matakuliah')->with('pesan', 'Data dihapus');
    }
}
