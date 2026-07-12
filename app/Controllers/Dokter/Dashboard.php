<?php

namespace App\Controllers\Dokter;

use App\Controllers\BaseController;
use App\Models\PemeriksaanModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $pemeriksaanModel = new PemeriksaanModel();
        $idDokter         = session()->get('id_pegawai');

        $data = [
            'title'                  => 'Dashboard Dokter',
            'jumlah_pasien_hari_ini' => $pemeriksaanModel->countPasienHariIni($idDokter),
            'jumlah_menunggu'        => $pemeriksaanModel->where('status', 'Menunggu Dokter')->countAllResults(),
        ];

        return view('dokter/dashboard', $data);
    }
}
