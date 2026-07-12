<?php

namespace App\Controllers\Dokter;

use App\Controllers\BaseController;
use App\Models\PemeriksaanModel;
use App\Models\PenyakitModel;

class Pemeriksaan extends BaseController
{
    protected $pemeriksaanModel;
    protected $penyakitModel;

    public function __construct()
    {
        $this->pemeriksaanModel = new PemeriksaanModel();
        $this->penyakitModel    = new PenyakitModel();
    }

    /**
     * Daftar pasien yang menunggu pemeriksaan dokter.
     */
    public function index()
    {
        $data = [
            'title'       => 'Daftar Pasien Menunggu',
            'pemeriksaan' => $this->pemeriksaanModel->getByStatus('Menunggu Dokter'),
        ];

        return view('dokter/pemeriksaan/index', $data);
    }

    /**
     * Form isi hasil pemeriksaan.
     */
    public function periksa(int $id)
    {
        $pemeriksaan = $this->pemeriksaanModel->getDetailPemeriksaan($id);

        if (!$pemeriksaan) {
            return redirect()->to('/dokter/pemeriksaan')->with('error', 'Data pemeriksaan tidak ditemukan.');
        }

        if ($pemeriksaan['status'] !== 'Menunggu Dokter') {
            return redirect()->to('/dokter/pemeriksaan')->with('error', 'Pemeriksaan ini sudah diselesaikan.');
        }

        $data = [
            'title'       => 'Isi Hasil Pemeriksaan',
            'pemeriksaan' => $pemeriksaan,
            'penyakit'    => $this->penyakitModel->orderBy('nama_penyakit', 'ASC')->findAll(),
        ];

        return view('dokter/pemeriksaan/periksa', $data);
    }

    /**
     * Simpan hasil pemeriksaan dokter.
     */
    public function simpan(int $id)
    {
        $pemeriksaan = $this->pemeriksaanModel->find($id);

        if (!$pemeriksaan) {
            return redirect()->to('/dokter/pemeriksaan')->with('error', 'Data pemeriksaan tidak ditemukan.');
        }

        $rules = [
            'id_penyakit'       => 'required',
            'hasil_pemeriksaan' => 'required|min_length[10]',
            'resep_obat'        => 'required|min_length[3]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->pemeriksaanModel->update($id, [
            'id_dokter'         => session()->get('id_pegawai'),
            'id_penyakit'       => $this->request->getPost('id_penyakit'),
            'hasil_pemeriksaan' => $this->request->getPost('hasil_pemeriksaan'),
            'resep_obat'        => $this->request->getPost('resep_obat'),
            'jadwal_kontrol'    => $this->request->getPost('jadwal_kontrol') ?: null,
            'status'            => 'Selesai',
        ]);

        return redirect()->to('/dokter/pemeriksaan')->with('success', 'Hasil pemeriksaan berhasil disimpan.');
    }

    /**
     * Riwayat semua pemeriksaan yang sudah selesai.
     */
    public function riwayat()
    {
        $dari   = $this->request->getGet('dari');
        $sampai = $this->request->getGet('sampai');

        $builder = $this->pemeriksaanModel->getPemeriksaanLengkap()
            ->whereIn('p.status', ['Selesai', 'Kontrol']);

        if ($dari) {
            $builder->where('DATE(p.tanggal_pemeriksaan) >=', $dari);
        }
        if ($sampai) {
            $builder->where('DATE(p.tanggal_pemeriksaan) <=', $sampai);
        }

        $data = [
            'title'       => 'Riwayat Pemeriksaan',
            'pemeriksaan' => $builder->get()->getResultArray(),
            'dari'        => $dari,
            'sampai'      => $sampai,
        ];

        return view('dokter/pemeriksaan/riwayat', $data);
    }

    /**
     * Detail satu pemeriksaan untuk dokter.
     */
    public function detail(int $id)
    {
        $pemeriksaan = $this->pemeriksaanModel->getDetailPemeriksaan($id);

        if (!$pemeriksaan) {
            return redirect()->to('/dokter/pemeriksaan/riwayat')->with('error', 'Data tidak ditemukan.');
        }

        return view('dokter/pemeriksaan/detail', ['title' => 'Detail Pemeriksaan', 'pemeriksaan' => $pemeriksaan]);
    }
}
