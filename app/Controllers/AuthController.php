<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    // Halaman login
    public function index()
    {
        return view('login/index');
    }

    // Proses login 
    public function cek()
    {
        $email = $this->request->getPost('email');
        $pass  = $this->request->getPost('password');

        if ($email === 'admin@uin.ac.id' && $pass === 'admin123') {
            session()->set('login_admin', true);
            return redirect()->to('/mahasiswa');
        }

        return redirect()->back()->with('pesan', 'Email atau password salah');
    }

    public function keluar()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
