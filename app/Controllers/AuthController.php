<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    // =========================
    // HALAMAN LOGIN
    // =========================
    public function index()
    {
        return view('login/index', [
            'title' => 'Login Sistem'
        ]);
    }

    // =========================
    // PROSES LOGIN
    // =========================
    public function cek()
    {
        // Validasi input
        if (!$this->validate([
            'email'    => 'required|valid_email',
            'password' => 'required'
        ])) {
            return redirect()->back()->withInput()
                ->with('pesan', 'Email dan password wajib diisi');
        }

        $email = $this->request->getPost('email');
        $pass  = $this->request->getPost('password');

        // Login statis (SESUIAI SOAL TES)
        if ($email === 'admin@uin.ac.id' && $pass === 'admin123') {

            // Set session login
            session()->set([
                'login_admin' => true,
                'email_admin' => $email
            ]);

            return redirect()->to('/mahasiswa');
        }

        // Jika gagal login
        return redirect()->back()
            ->with('pesan', 'Email atau password salah');
    }

    // =========================
    // LOGOUT
    // =========================
    public function keluar()
    {
        // Hapus session login
        session()->remove(['login_admin', 'email_admin']);
        session()->destroy();

        return redirect()->to('/login');
    }
}
