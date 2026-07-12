<?php

namespace App\Controllers\Perawat;

use App\Controllers\BaseController;
use App\Models\PasienModel;
use App\Models\PemeriksaanModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $pasienModel      = new PasienModel();
        $pemeriksaanModel = new PemeriksaanModel();

        $data = [
            'title'                    => 'Dashboard Perawat',
            'jumlah_pasien'            => $pasienModel->countAll(),
            'resep_belum_diajukan'     => $pemeriksaanModel->countResepBelumDiajukan(),
            'pemeriksaan_hari_ini'     => $pemeriksaanModel->countHariIni(),
        ];

        return view('perawat/dashboard', $data);
    }
}
