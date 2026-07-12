<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PenyakitModel;

class Penyakit extends BaseController
{
    protected $penyakitModel;

    public function __construct()
    {
        $this->penyakitModel = new PenyakitModel();
    }

    /**
     * Daftar semua penyakit.
     */
    public function index()
    {
        $data = [
            'title'   => 'Data Penyakit',
            'penyakit' => $this->penyakitModel->orderBy('nama_penyakit', 'ASC')->findAll(),
        ];

        return view('admin/penyakit/index', $data);
    }

    /**
     * Form tambah penyakit.
     */
    public function create()
    {
        return view('admin/penyakit/form', ['title' => 'Tambah Penyakit', 'penyakit' => null]);
    }

    /**
     * Simpan penyakit baru.
     */
    public function store()
    {
        $rules = [
            'nama_penyakit' => 'required|min_length[3]|max_length[150]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->penyakitModel->insert([
            'nama_penyakit' => $this->request->getPost('nama_penyakit'),
            'keterangan'    => $this->request->getPost('keterangan'),
        ]);

        return redirect()->to('/admin/penyakit')->with('success', 'Data penyakit berhasil ditambahkan.');
    }

    /**
     * Form edit penyakit.
     */
    public function edit(int $id)
    {
        $penyakit = $this->penyakitModel->find($id);

        if (!$penyakit) {
            return redirect()->to('/admin/penyakit')->with('error', 'Data penyakit tidak ditemukan.');
        }

        return view('admin/penyakit/form', ['title' => 'Edit Penyakit', 'penyakit' => $penyakit]);
    }

    /**
     * Update data penyakit.
     */
    public function update(int $id)
    {
        $penyakit = $this->penyakitModel->find($id);

        if (!$penyakit) {
            return redirect()->to('/admin/penyakit')->with('error', 'Data penyakit tidak ditemukan.');
        }

        $rules = [
            'nama_penyakit' => 'required|min_length[3]|max_length[150]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->penyakitModel->update($id, [
            'nama_penyakit' => $this->request->getPost('nama_penyakit'),
            'keterangan'    => $this->request->getPost('keterangan'),
        ]);

        return redirect()->to('/admin/penyakit')->with('success', 'Data penyakit berhasil diperbarui.');
    }

    /**
     * Hapus data penyakit.
     */
    public function delete(int $id)
    {
        $penyakit = $this->penyakitModel->find($id);

        if (!$penyakit) {
            return redirect()->to('/admin/penyakit')->with('error', 'Data penyakit tidak ditemukan.');
        }

        $this->penyakitModel->delete($id);

        return redirect()->to('/admin/penyakit')->with('success', 'Data penyakit berhasil dihapus.');
    }
}
