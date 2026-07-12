<?php

namespace App\Models;

use CodeIgniter\Model;

class PasienModel extends Model
{
    protected $table      = 'pasien';
    protected $primaryKey = 'id_pasien';

    protected $allowedFields = [
        'no_rm', 'nik', 'nama_pasien', 'jenis_kelamin',
        'tanggal_lahir', 'golongan_darah', 'alamat', 'no_hp',
    ];

    protected $useTimestamps = false;

    /**
     * Generate nomor rekam medis secara otomatis.
     * Format: RM-YYYY-XXXXX (contoh: RM-2024-00001)
     */
    public function generateNoRM(): string
    {
        $tahun = date('Y');
        $prefix = 'RM-' . $tahun . '-';

        // Cari nomor RM terakhir di tahun ini
        $lastRM = $this->like('no_rm', $prefix, 'after')
                       ->orderBy('id_pasien', 'DESC')
                       ->first();

        if ($lastRM) {
            // Ambil bagian angka terakhir dan tambah 1
            $lastNumber = (int) substr($lastRM['no_rm'], strlen($prefix));
            $newNumber  = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return $prefix . str_pad($newNumber, 5, '0', STR_PAD_LEFT);
    }

    /**
     * Cari pasien berdasarkan nama, no_rm, atau nik.
     */
    public function cariPasien(string $keyword)
    {
        return $this->groupStart()
                    ->like('nama_pasien', $keyword)
                    ->orLike('no_rm', $keyword)
                    ->orLike('nik', $keyword)
                    ->groupEnd()
                    ->findAll();
    }
}
