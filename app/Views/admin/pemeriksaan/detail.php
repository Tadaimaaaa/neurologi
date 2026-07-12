<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<?php
    $p = $pemeriksaan;
    $sc = match($p['status']) {
        'Menunggu Dokter' => 'warning',
        'Selesai'         => 'success',
        'Kontrol'         => 'info',
        default           => 'secondary',
    };
?>
<div class="row">
    <div class="col-md-5">
        <div class="card card-outline card-primary">
            <div class="card-header"><h3 class="card-title mb-0"><i class="fas fa-user me-2"></i>Data Pasien</h3></div>
            <div class="card-body table-responsive">
                <table class="table table-sm table-borderless">
                    <tr><td width="130" class="fw-semibold">No. RM</td><td>: <span class="badge bg-info"><?= esc($p['no_rm']) ?></span></td></tr>
                    <tr><td class="fw-semibold">Nama Pasien</td><td>: <?= esc($p['nama_pasien']) ?></td></tr>
                    <tr><td class="fw-semibold">NIK</td><td>: <?= esc($p['nik'] ?? '-') ?></td></tr>
                    <tr><td class="fw-semibold">Jenis Kelamin</td><td>: <?= esc($p['jenis_kelamin']) ?></td></tr>
                    <tr><td class="fw-semibold">Tgl Lahir</td><td>: <?= $p['tanggal_lahir'] ? date('d/m/Y', strtotime($p['tanggal_lahir'])) : '-' ?></td></tr>
                    <tr><td class="fw-semibold">Gol. Darah</td><td>: <?= esc($p['golongan_darah']) ?></td></tr>
                    <tr><td class="fw-semibold">No. HP</td><td>: <?= esc($p['no_hp_pasien'] ?? '-') ?></td></tr>
                    <tr><td class="fw-semibold">Alamat</td><td>: <?= esc($p['alamat_pasien'] ?? '-') ?></td></tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card card-outline card-<?= $sc ?>">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title mb-0"><i class="fas fa-stethoscope me-2"></i>Detail Pemeriksaan</h3>
                <span class="badge bg-<?= $sc ?>"><?= $p['status'] ?></span>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-sm table-borderless">
                    <tr><td width="140" class="fw-semibold">Tgl Periksa</td><td>: <?= date('d/m/Y H:i', strtotime($p['tanggal_pemeriksaan'])) ?></td></tr>
                    <tr><td class="fw-semibold">Dokter</td><td>: <?= esc($p['nama_dokter'] ?? '-') ?></td></tr>
                    <tr><td class="fw-semibold">Perawat</td><td>: <?= esc($p['nama_perawat'] ?? '-') ?></td></tr>
                    <tr><td class="fw-semibold">Diagnosa</td><td>: <?= esc($p['nama_penyakit'] ?? '-') ?></td></tr>
                    <tr><td class="fw-semibold">Keluhan</td><td>: <?= esc($p['keluhan_utama']) ?></td></tr>
                    <tr><td class="fw-semibold">Hasil Pemeriksaan</td><td>: <?= nl2br(esc($p['hasil_pemeriksaan'] ?? '-')) ?></td></tr>
                    <tr><td class="fw-semibold">Resep Obat</td><td>: <?= nl2br(esc($p['resep_obat'] ?? '-')) ?></td></tr>
                    <tr><td class="fw-semibold">Jadwal Kontrol</td><td>: <?= $p['jadwal_kontrol'] ? date('d/m/Y', strtotime($p['jadwal_kontrol'])) : '-' ?></td></tr>
                    <tr><td class="fw-semibold">Status Resep</td><td>: <span class="badge <?= $p['status_resep'] == 'Sudah Diajukan' ? 'bg-success' : 'bg-secondary' ?>"><?= $p['status_resep'] ?></span></td></tr>
                </table>
            </div>
        </div>
    </div>
</div>

<a href="<?= base_url('admin/pemeriksaan') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Kembali</a>

<?= $this->endSection() ?>
