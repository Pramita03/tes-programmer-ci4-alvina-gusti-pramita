<?php
public function index()
{
$data['mahasiswa'] = $this->mModel->orderBy('created_at','DESC')->findAll();
return view('mahasiswa/index',$data);
}


public function create()
{
helper('form');
return view('mahasiswa/form');
}


public function store()
{
$rules = [
'nim' => 'required|is_unique[mahasiswa.nim]',
'nama' => 'required'
];
if (!$this->validate($rules)) {
return redirect()->back()->withInput()->with('errors',$this->validator->getErrors());
}


$file = $this->request->getFile('foto');
$fileName = null;
if ($file && !$file->hasMoved()) {
$fileName = $file->getRandomName();
$file->move(WRITEPATH . '../public/uploads/mahasiswa/',$fileName);
}


$this->mModel->save([
'nim'=>$this->request->getPost('nim'),
'nama'=>$this->request->getPost('nama'),
'jenis_kelamin'=>$this->request->getPost('jenis_kelamin'),
'tempat_lahir'=>$this->request->getPost('tempat_lahir'),
'tanggal_lahir'=>$this->request->getPost('tanggal_lahir'),
'alamat'=>$this->request->getPost('alamat'),
'no_hp'=>$this->request->getPost('no_hp'),
'email'=>$this->request->getPost('email'),
'foto'=>$fileName
]);


return redirect()->to(site_url('mahasiswa'))->with('success','Data tersimpan');
}


public function edit($id)
{
$data['m'] = $this->mModel->find($id);
return view('mahasiswa/form',$data);
}


public function update($id)
{
$data = $this->request->getPost();
$file = $this->request->getFile('foto');
if ($file && $file->isValid()) {
$fileName = $file->getRandomName();
$file->move(WRITEPATH . '../public/uploads/mahasiswa/',$fileName);
$data['foto'] = $fileName;
}
$this->mModel->update($id,$data);
return redirect()->to(site_url('mahasiswa'))->with('success','Data diperbarui');
}


public function delete($id)
{
$this->mModel->delete($id);
return redirect()->to(site_url('mahasiswa'))->with('success','Data dihapus');
}
}
