<?php

namespace App\Controllers;

use App\Models\PegawaiModel;

class Auth extends BaseController
{
    protected $pegawaiModel;

    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
    }

    /**
     * Tampilkan halaman login.
     */
    public function index()
    {
        // Jika sudah login, redirect sesuai role
        if (session()->get('logged_in')) {
            return $this->redirectByRole(session()->get('role'));
        }

        return view('auth/login');
    }

    /**
     * Proses form login.
     */
    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Validasi input
        if (empty($username) || empty($password)) {
            return redirect()->to('/login')->with('error', 'Username dan password wajib diisi.');
        }

        // Cek ke database
        $pegawai = $this->pegawaiModel->cekLogin($username, $password);

        if (!$pegawai) {
            return redirect()->to('/login')->with('error', 'Username atau password salah, atau akun tidak aktif.');
        }

        // Simpan data ke session
        session()->set([
            'logged_in'    => true,
            'id_pegawai'   => $pegawai['id_pegawai'],
            'nama_pegawai' => $pegawai['nama_pegawai'],
            'username'     => $pegawai['username'],
            'role'         => $pegawai['role'],
        ]);

        return $this->redirectByRole($pegawai['role']);
    }

    /**
     * Logout: hapus session dan redirect ke login.
     */
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Anda berhasil logout.');
    }

    /**
     * Helper: redirect ke dashboard sesuai role.
     */
    private function redirectByRole(string $role)
    {
        return match ($role) {
            'admin'   => redirect()->to('/admin/dashboard'),
            'dokter'  => redirect()->to('/dokter/dashboard'),
            'perawat' => redirect()->to('/perawat/dashboard'),
            default   => redirect()->to('/login'),
        };
    }
}
