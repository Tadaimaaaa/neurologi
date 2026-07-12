<?= $this->extend('layouts/perawat') ?>
<?= $this->section('content') ?>

<?php $p = $pemeriksaan; ?>
<div class="row">
    <div class="col-md-5">
        <div class="card card-outline card-primary">
            <div class="card-header"><h3 class="card-title mb-0"><i class="fas fa-user me-2"></i>Data Pasien</h3></div>
            <div class="card-body">
                <table class="table table-sm table-borderless">
                    <tr><td class="fw-semibold" width="120">No. RM</td><td>: <span class="badge bg-info"><?= esc($p['no_rm']) ?></span></td></tr>
                    <tr><td class="fw-semibold">Nama</td><td>: <?= esc($p['nama_pasien']) ?></td></tr>
                    <tr><td class="fw-semibold">Jenis Kelamin</td><td>: <?= esc($p['jenis_kelamin']) ?></td></tr>
                    <tr><td class="fw-semibold">Tgl Lahir</td><td>: <?= $p['tanggal_lahir'] ? date('d/m/Y', strtotime($p['tanggal_lahir'])) : '-' ?></td></tr>
                    <tr><td class="fw-semibold">Gol. Darah</td><td>: <?= esc($p['golongan_darah']) ?></td></tr>
                    <tr><td class="fw-semibold">No. HP</td><td>: <?= esc($p['no_hp_pasien'] ?? '-') ?></td></tr>
                </table>
                <hr>
                <p class="fw-semibold mb-1">Keluhan Utama:</p>
                <p class="text-muted"><?= nl2br(esc($p['keluhan_utama'])) ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card card-outline" style="border-color:#5f4bb6;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title mb-0"><i class="fas fa-notes-medical me-2"></i>Hasil Pemeriksaan</h3>
                <?php
                    $sc = match($p['status']) {
                        'Menunggu Dokter' => 'bg-warning text-dark',
                        'Selesai'         => 'bg-success',
                        'Kontrol'         => 'bg-info',
                        default           => 'bg-secondary',
                    };
                ?>
                <span class="badge <?= $sc ?>"><?= $p['status'] ?></span>
            </div>
            <div class="card-body">
                <table class="table table-sm table-borderless">
                    <tr><td class="fw-semibold" width="130">Tgl Periksa</td><td>: <?= date('d/m/Y H:i', strtotime($p['tanggal_pemeriksaan'])) ?></td></tr>
                    <tr><td class="fw-semibold">Dokter</td><td>: <?= esc($p['nama_dokter'] ?? 'Belum diperiksa') ?></td></tr>
                    <tr><td class="fw-semibold">Diagnosa</td><td>: <?= esc($p['nama_penyakit'] ?? '-') ?></td></tr>
                    <tr><td class="fw-semibold">Hasil</td><td>: <?= nl2br(esc($p['hasil_pemeriksaan'] ?? '-')) ?></td></tr>
                    <tr><td class="fw-semibold">Resep Obat</td><td>: <?= nl2br(esc($p['resep_obat'] ?? '-')) ?></td></tr>
                    <tr><td class="fw-semibold">Jadwal Kontrol</td><td>: <?= $p['jadwal_kontrol'] ? date('d/m/Y', strtotime($p['jadwal_kontrol'])) : '-' ?></td></tr>
                    <tr>
                        <td class="fw-semibold">Status Resep</td>
                        <td>: <span class="badge <?= $p['status_resep'] == 'Sudah Diajukan' ? 'bg-success' : 'bg-secondary' ?>"><?= $p['status_resep'] ?></span></td>
                    </tr>
                </table>

                <?php if ($p['status'] == 'Selesai' && $p['status_resep'] == 'Belum Diajukan'): ?>
                    <hr>
                    <a href="<?= base_url('perawat/pemeriksaan/ajukan-resep/' . $p['id_pemeriksaan']) ?>"
                       class="btn btn-success"
                       onclick="return confirm('Ajukan resep ke apotek sekarang?')">
                        <i class="fas fa-prescription-bottle me-1"></i> Ajukan Resep ke Apotek
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<a href="<?= base_url('perawat/pemeriksaan') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Kembali</a>

<?= $this->endSection() ?>
