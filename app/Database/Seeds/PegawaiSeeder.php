<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_pegawai'  => 'Administrator',
                'username'      => 'admin',
                'password'      => 'admin123',
                'role'          => 'admin',
                'jenis_kelamin' => 'Laki-laki',
                'no_hp'         => '081234567890',
                'alamat'        => 'RS Bhayangkara Padang',
                'status'        => 'Aktif',
            ],
            [
                'nama_pegawai'  => 'dr. Budi Santoso, Sp.S',
                'username'      => 'dokter1',
                'password'      => 'dokter123',
                'role'          => 'dokter',
                'jenis_kelamin' => 'Laki-laki',
                'no_hp'         => '082345678901',
                'alamat'        => 'Jl. Sudirman No. 10, Padang',
                'status'        => 'Aktif',
            ],
            [
                'nama_pegawai'  => 'dr. Siti Rahayu, Sp.S',
                'username'      => 'dokter2',
                'password'      => 'dokter123',
                'role'          => 'dokter',
                'jenis_kelamin' => 'Perempuan',
                'no_hp'         => '083456789012',
                'alamat'        => 'Jl. M. Yamin No. 25, Padang',
                'status'        => 'Aktif',
            ],
            [
                'nama_pegawai'  => 'Dewi Permata, Amd.Kep',
                'username'      => 'perawat1',
                'password'      => 'perawat123',
                'role'          => 'perawat',
                'jenis_kelamin' => 'Perempuan',
                'no_hp'         => '084567890123',
                'alamat'        => 'Jl. Khatib Sulaiman No. 5, Padang',
                'status'        => 'Aktif',
            ],
            [
                'nama_pegawai'  => 'Andi Pratama, Amd.Kep',
                'username'      => 'perawat2',
                'password'      => 'perawat123',
                'role'          => 'perawat',
                'jenis_kelamin' => 'Laki-laki',
                'no_hp'         => '085678901234',
                'alamat'        => 'Jl. Veteran No. 15, Padang',
                'status'        => 'Aktif',
            ],
        ];

        $this->db->table('pegawai')->insertBatch($data);
    }
}
