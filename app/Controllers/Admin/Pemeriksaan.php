<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PemeriksaanModel;

class Pemeriksaan extends BaseController
{
    protected $pemeriksaanModel;

    public function __construct()
    {
        $this->pemeriksaanModel = new PemeriksaanModel();
    }

    /**
     * Tampilkan seluruh data pemeriksaan dengan filter status dan tanggal.
     */
    public function index()
    {
        $dari   = $this->request->getGet('dari');
        $sampai = $this->request->getGet('sampai');
        $status = $this->request->getGet('status');

        $pemeriksaan = $this->pemeriksaanModel->getLaporan($dari, $sampai, $status);

        $data = [
            'title'       => 'Data Pemeriksaan',
            'pemeriksaan' => $pemeriksaan,
            'dari'        => $dari,
            'sampai'      => $sampai,
            'status'      => $status,
        ];

        return view('admin/pemeriksaan/index', $data);
    }

    /**
     * Detail satu pemeriksaan.
     */
    public function detail(int $id)
    {
        $pemeriksaan = $this->pemeriksaanModel->getDetailPemeriksaan($id);

        if (!$pemeriksaan) {
            return redirect()->to('/admin/pemeriksaan')->with('error', 'Data pemeriksaan tidak ditemukan.');
        }

        return view('admin/pemeriksaan/detail', ['title' => 'Detail Pemeriksaan', 'pemeriksaan' => $pemeriksaan]);
    }
}
