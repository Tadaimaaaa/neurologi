<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePemeriksaanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pemeriksaan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_pasien' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_dokter' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null'     => true,
            ],
            'id_perawat' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_penyakit' => [
                'type'     => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null'     => true,
            ],
            'tanggal_pemeriksaan' => [
                'type' => 'DATETIME',
            ],
            'keluhan_utama' => [
                'type' => 'TEXT',
            ],
            'hasil_pemeriksaan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'resep_obat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'jadwal_kontrol' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['Menunggu Dokter', 'Selesai', 'Kontrol'],
                'default'    => 'Menunggu Dokter',
            ],
            'status_resep' => [
                'type'       => 'ENUM',
                'constraint' => ['Belum Diajukan', 'Sudah Diajukan'],
                'default'    => 'Belum Diajukan',
            ],
        ]);

        $this->forge->addPrimaryKey('id_pemeriksaan');
        $this->forge->addForeignKey('id_pasien', 'pasien', 'id_pasien', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_dokter', 'pegawai', 'id_pegawai', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('id_perawat', 'pegawai', 'id_pegawai', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_penyakit', 'penyakit', 'id_penyakit', 'SET NULL', 'CASCADE');
        $this->forge->createTable('pemeriksaan');
    }

    public function down()
    {
        $this->forge->dropTable('pemeriksaan');
    }
}
