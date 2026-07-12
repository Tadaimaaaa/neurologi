<?= $this->extend('layouts/dokter') ?>
<?= $this->section('content') ?>

<?php $p = $pemeriksaan; ?>
<div class="row">
    <div class="col-md-5">
        <div class="card card-outline card-primary">
            <div class="card-header"><h3 class="card-title mb-0"><i class="fas fa-user me-2"></i>Data Pasien</h3></div>
            <div class="card-body">
                <table class="table table-sm table-borderless">
                    <tr><td class="fw-semibold" width="130">No. RM</td><td>: <span class="badge bg-info"><?= esc($p['no_rm']) ?></span></td></tr>
                    <tr><td class="fw-semibold">Nama</td><td>: <?= esc($p['nama_pasien']) ?></td></tr>
                    <tr><td class="fw-semibold">Jenis Kelamin</td><td>: <?= esc($p['jenis_kelamin']) ?></td></tr>
                    <tr><td class="fw-semibold">Tgl Lahir</td><td>: <?= $p['tanggal_lahir'] ? date('d/m/Y', strtotime($p['tanggal_lahir'])) : '-' ?></td></tr>
                    <tr><td class="fw-semibold">Gol. Darah</td><td>: <?= esc($p['golongan_darah']) ?></td></tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card card-outline card-success">
            <div class="card-header"><h3 class="card-title mb-0"><i class="fas fa-notes-medical me-2"></i>Hasil Pemeriksaan</h3></div>
            <div class="card-body">
                <table class="table table-sm table-borderless">
                    <tr><td class="fw-semibold" width="140">Tgl Periksa</td><td>: <?= date('d/m/Y H:i', strtotime($p['tanggal_pemeriksaan'])) ?></td></tr>
                    <tr><td class="fw-semibold">Perawat</td><td>: <?= esc($p['nama_perawat'] ?? '-') ?></td></tr>
                    <tr><td class="fw-semibold">Diagnosa</td><td>: <?= esc($p['nama_penyakit'] ?? '-') ?></td></tr>
                    <tr><td class="fw-semibold">Keluhan</td><td>: <?= esc($p['keluhan_utama']) ?></td></tr>
                    <tr><td class="fw-semibold">Hasil</td><td>: <?= nl2br(esc($p['hasil_pemeriksaan'] ?? '-')) ?></td></tr>
                    <tr><td class="fw-semibold">Resep Obat</td><td>: <?= nl2br(esc($p['resep_obat'] ?? '-')) ?></td></tr>
                    <tr><td class="fw-semibold">Jadwal Kontrol</td><td>: <?= $p['jadwal_kontrol'] ? date('d/m/Y', strtotime($p['jadwal_kontrol'])) : '-' ?></td></tr>
                    <tr><td class="fw-semibold">Status</td><td>: <span class="badge bg-success"><?= $p['status'] ?></span></td></tr>
                </table>
            </div>
        </div>
    </div>
</div>
<a href="<?= base_url('dokter/riwayat') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Kembali</a>

<?= $this->endSection() ?>
