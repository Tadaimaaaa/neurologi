<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PemeriksaanModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class Laporan extends BaseController
{
    protected $pemeriksaanModel;

    public function __construct()
    {
        $this->pemeriksaanModel = new PemeriksaanModel();
    }

    /**
     * Form filter laporan pemeriksaan.
     */
    public function index()
    {
        $dari        = $this->request->getGet('dari');
        $sampai      = $this->request->getGet('sampai');
        $status      = $this->request->getGet('status');
        $pemeriksaan = [];

        if ($dari || $sampai || $status) {
            $pemeriksaan = $this->pemeriksaanModel->getLaporan($dari, $sampai, $status);
        }

        $data = [
            'title'       => 'Laporan Pemeriksaan',
            'pemeriksaan' => $pemeriksaan,
            'dari'        => $dari,
            'sampai'      => $sampai,
            'status'      => $status,
        ];

        return view('admin/laporan/index', $data);
    }

    /**
     * Cetak laporan dalam format PDF menggunakan DOMPDF.
     */
    public function cetak()
    {
        $dari        = $this->request->getGet('dari');
        $sampai      = $this->request->getGet('sampai');
        $status      = $this->request->getGet('status');
        $pemeriksaan = $this->pemeriksaanModel->getLaporan($dari, $sampai, $status);

        // Render view HTML untuk PDF
        $html = view('admin/laporan/cetak', [
            'pemeriksaan' => $pemeriksaan,
            'dari'        => $dari,
            'sampai'      => $sampai,
            'status'      => $status,
            'dicetak_oleh'=> session()->get('nama_pegawai'),
            'tanggal_cetak' => date('d/m/Y H:i'),
        ]);

        // Setup DOMPDF
        $options = new Options();
        $options->set('defaultFont', 'DejaVu Sans');
        $options->set('isRemoteEnabled', false);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        $filename = 'Laporan_Pemeriksaan_' . date('Ymd_His') . '.pdf';
        $dompdf->stream($filename, ['Attachment' => false]);
    }
}
