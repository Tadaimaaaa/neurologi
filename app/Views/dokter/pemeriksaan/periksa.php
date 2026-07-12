<?= $this->extend('layouts/dokter') ?>
<?= $this->section('content') ?>

<?php $p = $pemeriksaan; ?>

<div class="row">
    <!-- Data Pasien -->
    <div class="col-md-4">
        <div class="card card-outline card-info">
            <div class="card-header"><h3 class="card-title mb-0"><i class="fas fa-user me-2"></i>Data Pasien</h3></div>
            <div class="card-body">
                <table class="table table-sm table-borderless">
                    <tr><td class="fw-semibold">No. RM</td><td>: <span class="badge bg-info"><?= esc($p['no_rm']) ?></span></td></tr>
                    <tr><td class="fw-semibold">Nama</td><td>: <?= esc($p['nama_pasien']) ?></td></tr>
                    <tr><td class="fw-semibold">Jenis Kelamin</td><td>: <?= esc($p['jenis_kelamin']) ?></td></tr>
                    <tr><td class="fw-semibold">Tgl Lahir</td><td>: <?= $p['tanggal_lahir'] ? date('d/m/Y', strtotime($p['tanggal_lahir'])) : '-' ?></td></tr>
                    <tr><td class="fw-semibold">Gol. Darah</td><td>: <?= esc($p['golongan_darah']) ?></td></tr>
                </table>
                <hr>
                <p class="mb-1 fw-semibold">Keluhan Utama:</p>
                <p class="text-muted"><?= nl2br(esc($p['keluhan_utama'])) ?></p>
            </div>
        </div>
    </div>

    <!-- Form Pemeriksaan -->
    <div class="col-md-8">
        <div class="card card-outline card-success">
            <div class="card-header"><h3 class="card-title mb-0"><i class="fas fa-stethoscope me-2"></i>Isi Hasil Pemeriksaan</h3></div>
            <div class="card-body">
                <form action="<?= base_url('dokter/pemeriksaan/simpan/' . $p['id_pemeriksaan']) ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label class="form-label">Diagnosa Penyakit <span class="text-danger">*</span></label>
                        <select name="id_penyakit" class="form-select" required>
                            <option value="">-- Pilih Penyakit --</option>
                            <?php foreach ($penyakit as $py): ?>
                                <option value="<?= $py['id_penyakit'] ?>"
                                    <?= old('id_penyakit') == $py['id_penyakit'] ? 'selected' : '' ?>>
                                    <?= esc($py['nama_penyakit']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hasil Pemeriksaan <span class="text-danger">*</span></label>
                        <textarea name="hasil_pemeriksaan" class="form-control" rows="4" required
                                  placeholder="Tuliskan hasil pemeriksaan secara lengkap..."><?= old('hasil_pemeriksaan') ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Resep Obat <span class="text-danger">*</span></label>
                        <textarea name="resep_obat" class="form-control" rows="3" required
                                  placeholder="Contoh: Paracetamol 500mg 3x1, Amlodipin 5mg 1x1..."><?= old('resep_obat') ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jadwal Kontrol <small class="text-muted">(opsional)</small></label>
                        <input type="date" name="jadwal_kontrol" class="form-control"
                               value="<?= old('jadwal_kontrol') ?>" min="<?= date('Y-m-d') ?>">
                    </div>

                    <hr>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success" onclick="return confirm('Simpan hasil pemeriksaan ini?')">
                            <i class="fas fa-save me-1"></i> Simpan & Selesaikan
                        </button>
                        <a href="<?= base_url('dokter/pemeriksaan') ?>" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
