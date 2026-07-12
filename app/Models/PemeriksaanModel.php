<?php

namespace App\Models;

use CodeIgniter\Model;

class PemeriksaanModel extends Model
{
    protected $table      = 'pemeriksaan';
    protected $primaryKey = 'id_pemeriksaan';

    protected $allowedFields = [
        'id_pasien', 'id_dokter', 'id_perawat', 'id_penyakit',
        'tanggal_pemeriksaan', 'keluhan_utama', 'hasil_pemeriksaan',
        'resep_obat', 'jadwal_kontrol', 'status', 'status_resep',
    ];

    protected $useTimestamps = false;

    /**
     * Ambil data pemeriksaan beserta relasi pasien, dokter, perawat, penyakit.
     */
    public function getPemeriksaanLengkap()
    {
        return $this->db->table('pemeriksaan p')
            ->select('p.*, ps.nama_pasien, ps.no_rm, dok.nama_pegawai AS nama_dokter, prw.nama_pegawai AS nama_perawat, pyk.nama_penyakit')
            ->join('pasien ps', 'ps.id_pasien = p.id_pasien', 'left')
            ->join('pegawai dok', 'dok.id_pegawai = p.id_dokter', 'left')
            ->join('pegawai prw', 'prw.id_pegawai = p.id_perawat', 'left')
            ->join('penyakit pyk', 'pyk.id_penyakit = p.id_penyakit', 'left')
            ->orderBy('p.tanggal_pemeriksaan', 'DESC');
    }

    /**
     * Ambil satu data pemeriksaan lengkap berdasarkan ID.
     */
    public function getDetailPemeriksaan(int $id)
    {
        return $this->db->table('pemeriksaan p')
            ->select('p.*, ps.nama_pasien, ps.no_rm, ps.nik, ps.jenis_kelamin, ps.tanggal_lahir, ps.golongan_darah, ps.alamat AS alamat_pasien, ps.no_hp AS no_hp_pasien, dok.nama_pegawai AS nama_dokter, prw.nama_pegawai AS nama_perawat, pyk.nama_penyakit')
            ->join('pasien ps', 'ps.id_pasien = p.id_pasien', 'left')
            ->join('pegawai dok', 'dok.id_pegawai = p.id_dokter', 'left')
            ->join('pegawai prw', 'prw.id_pegawai = p.id_perawat', 'left')
            ->join('penyakit pyk', 'pyk.id_penyakit = p.id_penyakit', 'left')
            ->where('p.id_pemeriksaan', $id)
            ->get()
            ->getRowArray();
    }

    /**
     * Ambil daftar pemeriksaan berdasarkan status (untuk tampilan dokter).
     */
    public function getByStatus(string $status)
    {
        return $this->db->table('pemeriksaan p')
            ->select('p.*, ps.nama_pasien, ps.no_rm, prw.nama_pegawai AS nama_perawat')
            ->join('pasien ps', 'ps.id_pasien = p.id_pasien', 'left')
            ->join('pegawai prw', 'prw.id_pegawai = p.id_perawat', 'left')
            ->where('p.status', $status)
            ->orderBy('p.tanggal_pemeriksaan', 'ASC')
            ->get()
            ->getResultArray();
    }

    /**
     * Ambil riwayat pemeriksaan untuk satu pasien.
     */
    public function getRiwayatByPasien(int $idPasien)
    {
        return $this->db->table('pemeriksaan p')
            ->select('p.*, ps.nama_pasien, ps.no_rm, dok.nama_pegawai AS nama_dokter, pyk.nama_penyakit')
            ->join('pasien ps', 'ps.id_pasien = p.id_pasien', 'left')
            ->join('pegawai dok', 'dok.id_pegawai = p.id_dokter', 'left')
            ->join('penyakit pyk', 'pyk.id_penyakit = p.id_penyakit', 'left')
            ->where('p.id_pasien', $idPasien)
            ->orderBy('p.tanggal_pemeriksaan', 'DESC')
            ->get()
            ->getResultArray();
    }

    /**
     * Ambil pemeriksaan yang ditangani oleh perawat tertentu.
     */
    public function getByPerawat(int $idPerawat)
    {
        return $this->db->table('pemeriksaan p')
            ->select('p.*, ps.nama_pasien, ps.no_rm, dok.nama_pegawai AS nama_dokter, pyk.nama_penyakit')
            ->join('pasien ps', 'ps.id_pasien = p.id_pasien', 'left')
            ->join('pegawai dok', 'dok.id_pegawai = p.id_dokter', 'left')
            ->join('penyakit pyk', 'pyk.id_penyakit = p.id_penyakit', 'left')
            ->where('p.id_perawat', $idPerawat)
            ->orderBy('p.tanggal_pemeriksaan', 'DESC')
            ->get()
            ->getResultArray();
    }

    /**
     * Jumlah pemeriksaan hari ini.
     */
    public function countHariIni(): int
    {
        return $this->where('DATE(tanggal_pemeriksaan)', date('Y-m-d'))->countAllResults();
    }

    /**
     * Jumlah resep belum diajukan.
     */
    public function countResepBelumDiajukan(): int
    {
        return $this->where('status_resep', 'Belum Diajukan')
                    ->where('status', 'Selesai')
                    ->countAllResults();
    }

    /**
     * Jumlah pasien yang diperiksa hari ini (per dokter).
     */
    public function countPasienHariIni(int $idDokter): int
    {
        return $this->where('DATE(tanggal_pemeriksaan)', date('Y-m-d'))
                    ->where('id_dokter', $idDokter)
                    ->countAllResults();
    }

    /**
     * Data untuk laporan berdasarkan filter tanggal.
     */
    public function getLaporan(?string $dari = null, ?string $sampai = null, ?string $status = null)
    {
        $builder = $this->db->table('pemeriksaan p')
            ->select('p.*, ps.nama_pasien, ps.no_rm, ps.nik, dok.nama_pegawai AS nama_dokter, prw.nama_pegawai AS nama_perawat, pyk.nama_penyakit')
            ->join('pasien ps', 'ps.id_pasien = p.id_pasien', 'left')
            ->join('pegawai dok', 'dok.id_pegawai = p.id_dokter', 'left')
            ->join('pegawai prw', 'prw.id_pegawai = p.id_perawat', 'left')
            ->join('penyakit pyk', 'pyk.id_penyakit = p.id_penyakit', 'left');

        if ($dari) {
            $builder->where('DATE(p.tanggal_pemeriksaan) >=', $dari);
        }
        if ($sampai) {
            $builder->where('DATE(p.tanggal_pemeriksaan) <=', $sampai);
        }
        if ($status) {
            $builder->where('p.status', $status);
        }

        return $builder->orderBy('p.tanggal_pemeriksaan', 'ASC')->get()->getResultArray();
    }
}
