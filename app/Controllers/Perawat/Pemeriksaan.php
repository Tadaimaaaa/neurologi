<?php

namespace App\Controllers\Perawat;

use App\Controllers\BaseController;
use App\Models\PasienModel;
use App\Models\PemeriksaanModel;
use App\Models\PegawaiModel;

class Pemeriksaan extends BaseController
{
    protected $pemeriksaanModel;
    protected $pasienModel;
    protected $pegawaiModel;

    public function __construct()
    {
        $this->pemeriksaanModel = new PemeriksaanModel();
        $this->pasienModel      = new PasienModel();
        $this->pegawaiModel     = new PegawaiModel();
    }

    /**
     * Daftar pemeriksaan milik perawat yang sedang login.
     */
    public function index()
    {
        $idPerawat   = session()->get('id_pegawai');
        $pemeriksaan = $this->pemeriksaanModel->getByPerawat($idPerawat);

        $data = [
            'title'       => 'Data Pemeriksaan',
            'pemeriksaan' => $pemeriksaan,
        ];

        return view('perawat/pemeriksaan/index', $data);
    }

    /**
     * Form registrasi pemeriksaan baru.
     * Perawat memilih pasien dan menginput keluhan.
     */
    public function registrasi()
    {
        $keyword = $this->request->getGet('q');
        $pasien  = $keyword ? $this->pasienModel->cariPasien($keyword) : [];

        $data = [
            'title'   => 'Registrasi Pemeriksaan',
            'pasien'  => $pasien,
            'keyword' => $keyword,
            'dokter'  => $this->pegawaiModel->getDokter(),
        ];

        return view('perawat/pemeriksaan/registrasi', $data);
    }

    /**
     * Simpan data registrasi pemeriksaan baru.
     */
    public function simpan()
    {
        $rules = [
            'id_pasien'    => 'required|integer',
            'id_dokter'    => 'required|integer',
            'keluhan_utama'=> 'required|min_length[5]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Cek apakah pasien sudah ada pemeriksaan yang masih Menunggu Dokter
        $cek = $this->pemeriksaanModel
            ->where('id_pasien', $this->request->getPost('id_pasien'))
            ->where('status', 'Menunggu Dokter')
            ->first();

        if ($cek) {
            return redirect()->back()->with('error', 'Pasien ini sudah memiliki pemeriksaan yang masih menunggu dokter.');
        }

        $this->pemeriksaanModel->insert([
            'id_pasien'          => $this->request->getPost('id_pasien'),
            'id_dokter'          => $this->request->getPost('id_dokter'),
            'id_perawat'         => session()->get('id_pegawai'),
            'tanggal_pemeriksaan'=> date('Y-m-d H:i:s'),
            'keluhan_utama'      => $this->request->getPost('keluhan_utama'),
            'status'             => 'Menunggu Dokter',
            'status_resep'       => 'Belum Diajukan',
        ]);

        return redirect()->to('/perawat/pemeriksaan')->with('success', 'Registrasi pemeriksaan berhasil. Pasien menunggu dokter.');
    }

    /**
     * Detail pemeriksaan untuk perawat.
     */
    public function detail(int $id)
    {
        $pemeriksaan = $this->pemeriksaanModel->getDetailPemeriksaan($id);

        if (!$pemeriksaan) {
            return redirect()->to('/perawat/pemeriksaan')->with('error', 'Data tidak ditemukan.');
        }

        return view('perawat/pemeriksaan/detail', ['title' => 'Detail Pemeriksaan', 'pemeriksaan' => $pemeriksaan]);
    }

    /**
     * Perawat mengajukan resep ke apotek.
     */
    public function ajukanResep(int $id)
    {
        $pemeriksaan = $this->pemeriksaanModel->find($id);

        if (!$pemeriksaan) {
            return redirect()->to('/perawat/pemeriksaan')->with('error', 'Data tidak ditemukan.');
        }

        if ($pemeriksaan['status'] !== 'Selesai') {
            return redirect()->to('/perawat/pemeriksaan')->with('error', 'Resep hanya bisa diajukan untuk pemeriksaan yang sudah selesai.');
        }

        if ($pemeriksaan['status_resep'] === 'Sudah Diajukan') {
            return redirect()->to('/perawat/pemeriksaan')->with('error', 'Resep sudah diajukan sebelumnya.');
        }

        $this->pemeriksaanModel->update($id, ['status_resep' => 'Sudah Diajukan']);

        return redirect()->to('/perawat/pemeriksaan')->with('success', 'Resep berhasil diajukan ke apotek.');
    }
}
