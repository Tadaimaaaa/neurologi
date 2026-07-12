<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;
use App\Models\PasienModel;
use App\Models\PenyakitModel;
use App\Models\PemeriksaanModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $pegawaiModel     = new PegawaiModel();
        $pasienModel      = new PasienModel();
        $penyakitModel    = new PenyakitModel();
        $pemeriksaanModel = new PemeriksaanModel();

        $data = [
            'title'              => 'Dashboard Admin',
            'jumlah_pegawai'     => $pegawaiModel->countAll(),
            'jumlah_pasien'      => $pasienModel->countAll(),
            'jumlah_penyakit'    => $penyakitModel->countAll(),
            'jumlah_pemeriksaan' => $pemeriksaanModel->countAll(),
        ];

        return view('admin/dashboard', $data);
    }
}
