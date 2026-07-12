<?php

namespace App\Controllers\Perawat;

use App\Controllers\BaseController;
use App\Models\PasienModel;

class Pasien extends BaseController
{
    protected $pasienModel;

    public function __construct()
    {
        $this->pasienModel = new PasienModel();
    }

    /**
     * Daftar pasien dengan pencarian.
     */
    public function index()
    {
        $keyword = $this->request->getGet('q');
        $pasien  = $keyword
            ? $this->pasienModel->cariPasien($keyword)
            : $this->pasienModel->orderBy('nama_pasien', 'ASC')->findAll();

        $data = [
            'title'   => 'Data Pasien',
            'pasien'  => $pasien,
            'keyword' => $keyword,
        ];

        return view('perawat/pasien/index', $data);
    }

    /**
     * Form tambah pasien.
     */
    public function create()
    {
        return view('perawat/pasien/form', ['title' => 'Tambah Pasien Baru', 'pasien' => null]);
    }

    /**
     * Simpan pasien baru.
     */
    public function store()
    {
        $rules = [
            'nama_pasien'   => 'required|min_length[3]|max_length[100]',
            'nik'           => 'permit_empty|max_length[20]',
            'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
            'tanggal_lahir' => 'permit_empty|valid_date[Y-m-d]',
            'golongan_darah'=> 'required|in_list[A,B,AB,O,Tidak Diketahui]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $noRM = $this->pasienModel->generateNoRM();

        $this->pasienModel->insert([
            'no_rm'          => $noRM,
            'nik'            => $this->request->getPost('nik'),
            'nama_pasien'    => $this->request->getPost('nama_pasien'),
            'jenis_kelamin'  => $this->request->getPost('jenis_kelamin'),
            'tanggal_lahir'  => $this->request->getPost('tanggal_lahir'),
            'golongan_darah' => $this->request->getPost('golongan_darah'),
            'alamat'         => $this->request->getPost('alamat'),
            'no_hp'          => $this->request->getPost('no_hp'),
        ]);

        return redirect()->to('/perawat/pasien')->with('success', "Pasien berhasil ditambahkan. No. RM: {$noRM}");
    }

    /**
     * Form edit pasien.
     */
    public function edit(int $id)
    {
        $pasien = $this->pasienModel->find($id);

        if (!$pasien) {
            return redirect()->to('/perawat/pasien')->with('error', 'Data pasien tidak ditemukan.');
        }

        return view('perawat/pasien/form', ['title' => 'Edit Data Pasien', 'pasien' => $pasien]);
    }

    /**
     * Update data pasien.
     */
    public function update(int $id)
    {
        $pasien = $this->pasienModel->find($id);

        if (!$pasien) {
            return redirect()->to('/perawat/pasien')->with('error', 'Data pasien tidak ditemukan.');
        }

        $rules = [
            'nama_pasien'   => 'required|min_length[3]|max_length[100]',
            'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
            'golongan_darah'=> 'required|in_list[A,B,AB,O,Tidak Diketahui]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->pasienModel->update($id, [
            'nik'            => $this->request->getPost('nik'),
            'nama_pasien'    => $this->request->getPost('nama_pasien'),
            'jenis_kelamin'  => $this->request->getPost('jenis_kelamin'),
            'tanggal_lahir'  => $this->request->getPost('tanggal_lahir'),
            'golongan_darah' => $this->request->getPost('golongan_darah'),
            'alamat'         => $this->request->getPost('alamat'),
            'no_hp'          => $this->request->getPost('no_hp'),
        ]);

        return redirect()->to('/perawat/pasien')->with('success', 'Data pasien berhasil diperbarui.');
    }
}
