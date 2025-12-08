<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\MahasiswaModel;


class AuthController extends BaseController
{
public function login()
{
helper(['form']);
if ($this->request->getMethod() === 'post') {
$role = $this->request->getPost('role');
$email = $this->request->getPost('email');
$password = $this->request->getPost('password');


// contoh: admin hardcoded (production -> DB)
if ($role === 'admin' && $email === 'admin@domain.com' && $password === 'admin123') {
session()->set(['isLoggedIn'=>true,'role'=>'admin','user'=>['email'=>$email]]);
return redirect()->to(site_url('dashboard'));
}


// mahasiswa login by email (opsional bcrypt)
$mModel = new MahasiswaModel();
$user = $mModel->where('email',$email)->first();
if ($user) {
// jika pakai password hash di kolom (tidak wajib untuk soal ini)
// if (password_verify($password,$user['password'])) { ... }
session()->set(['isLoggedIn'=>true,'role'=>'mahasiswa','user'=>$user]);
return redirect()->to(site_url('mahasiswa'));
}


return redirect()->back()->with('error','Login gagal');
}
return view('auth/login');
}


public function logout()
{
session()->destroy();
return redirect()->to(site_url('login'));
}
}
