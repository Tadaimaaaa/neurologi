<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;

class Pegawai extends BaseController
{
    protected $pegawaiModel;

    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
    }

    /**
     * Daftar semua pegawai.
     */
    public function index()
    {
        $data = [
            'title'   => 'Data Pegawai',
            'pegawai' => $this->pegawaiModel->orderBy('nama_pegawai', 'ASC')->findAll(),
        ];

        return view('admin/pegawai/index', $data);
    }

    /**
     * Form tambah pegawai.
     */
    public function create()
    {
        return view('admin/pegawai/form', ['title' => 'Tambah Pegawai', 'pegawai' => null]);
    }

    /**
     * Simpan data pegawai baru.
     */
    public function store()
    {
        $rules = [
            'nama_pegawai'  => 'required|min_length[3]|max_length[100]',
            'username'      => 'required|min_length[3]|max_length[50]|is_unique[pegawai.username]',
            'password'      => 'required|min_length[6]',
            'role'          => 'required|in_list[admin,dokter,perawat]',
            'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
            'no_hp'         => 'permit_empty|max_length[20]',
            'status'        => 'required|in_list[Aktif,Tidak Aktif]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->pegawaiModel->insert([
            'nama_pegawai'  => $this->request->getPost('nama_pegawai'),
            'username'      => $this->request->getPost('username'),
            'password'      => $this->request->getPost('password'),
            'role'          => $this->request->getPost('role'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'no_hp'         => $this->request->getPost('no_hp'),
            'alamat'        => $this->request->getPost('alamat'),
            'status'        => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/pegawai')->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    /**
     * Form edit pegawai.
     */
    public function edit(int $id)
    {
        $pegawai = $this->pegawaiModel->find($id);

        if (!$pegawai) {
            return redirect()->to('/admin/pegawai')->with('error', 'Data pegawai tidak ditemukan.');
        }

        return view('admin/pegawai/form', ['title' => 'Edit Pegawai', 'pegawai' => $pegawai]);
    }

    /**
     * Update data pegawai.
     */
    public function update(int $id)
    {
        $pegawai = $this->pegawaiModel->find($id);

        if (!$pegawai) {
            return redirect()->to('/admin/pegawai')->with('error', 'Data pegawai tidak ditemukan.');
        }

        // Aturan validasi (username unique, kecuali milik data ini sendiri)
        $rules = [
            'nama_pegawai'  => 'required|min_length[3]|max_length[100]',
            'username'      => "required|min_length[3]|max_length[50]|is_unique[pegawai.username,id_pegawai,{$id}]",
            'role'          => 'required|in_list[admin,dokter,perawat]',
            'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
            'status'        => 'required|in_list[Aktif,Tidak Aktif]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $updateData = [
            'nama_pegawai'  => $this->request->getPost('nama_pegawai'),
            'username'      => $this->request->getPost('username'),
            'role'          => $this->request->getPost('role'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'no_hp'         => $this->request->getPost('no_hp'),
            'alamat'        => $this->request->getPost('alamat'),
            'status'        => $this->request->getPost('status'),
        ];

        // Update password hanya jika diisi
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $updateData['password'] = $password;
        }

        $this->pegawaiModel->update($id, $updateData);

        return redirect()->to('/admin/pegawai')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    /**
     * Hapus data pegawai.
     */
    public function delete(int $id)
    {
        $pegawai = $this->pegawaiModel->find($id);

        if (!$pegawai) {
            return redirect()->to('/admin/pegawai')->with('error', 'Data pegawai tidak ditemukan.');
        }

        // Jangan hapus akun sendiri
        if ($id == session()->get('id_pegawai')) {
            return redirect()->to('/admin/pegawai')->with('error', 'Tidak dapat menghapus akun yang sedang aktif.');
        }

        $this->pegawaiModel->delete($id);

        return redirect()->to('/admin/pegawai')->with('success', 'Data pegawai berhasil dihapus.');
    }
}
