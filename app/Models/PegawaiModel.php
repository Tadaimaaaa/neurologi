<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table      = 'pegawai';
    protected $primaryKey = 'id_pegawai';

    protected $allowedFields = [
        'nama_pegawai', 'username', 'password', 'role',
        'jenis_kelamin', 'no_hp', 'alamat', 'status',
    ];

    protected $useTimestamps = false;

    /**
     * Cek login: cari pegawai berdasarkan username dan password.
     */
    public function cekLogin(string $username, string $password)
    {
        return $this->where('username', $username)
                    ->where('password', $password)
                    ->where('status', 'Aktif')
                    ->first();
    }

    /**
     * Ambil semua dokter aktif untuk dropdown.
     */
    public function getDokter()
    {
        return $this->where('role', 'dokter')
                    ->where('status', 'Aktif')
                    ->findAll();
    }

    /**
     * Ambil semua perawat aktif untuk dropdown.
     */
    public function getPerawat()
    {
        return $this->where('role', 'perawat')
                    ->where('status', 'Aktif')
                    ->findAll();
    }
}
