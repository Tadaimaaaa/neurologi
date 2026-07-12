<?= $this->extend('layouts/perawat') ?>
<?= $this->section('content') ?>

<div class="row">
    <!-- Cari Pasien -->
    <div class="col-md-5">
        <div class="card card-outline" style="border-color:#5f4bb6;">
            <div class="card-header"><h3 class="card-title mb-0"><i class="fas fa-search me-2"></i>Cari Pasien</h3></div>
            <div class="card-body">
                <form action="" method="get">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control"
                               placeholder="Cari nama, No. RM, atau NIK..."
                               value="<?= esc($keyword ?? '') ?>" autofocus>
                        <button type="submit" class="btn" style="background-color:#5f4bb6; color:white;">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                </form>

                <?php if (!empty($pasien)): ?>
                    <div class="mt-3">
                        <p class="fw-semibold text-muted mb-2">Hasil pencarian (<?= count($pasien) ?> data):</p>
                        <div class="list-group">
                            <?php foreach ($pasien as $p): ?>
                                <button type="button" class="list-group-item list-group-item-action"
                                        onclick="pilihPasien(<?= $p['id_pasien'] ?>, '<?= esc($p['no_rm']) ?>', '<?= esc($p['nama_pasien']) ?>', '<?= esc($p['jenis_kelamin']) ?>')">
                                    <div class="fw-semibold"><?= esc($p['nama_pasien']) ?></div>
                                    <small class="text-muted">No. RM: <?= esc($p['no_rm']) ?> | <?= esc($p['jenis_kelamin']) ?></small>
                                </button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php elseif (isset($keyword) && $keyword !== ''): ?>
                    <div class="mt-3 alert alert-warning py-2">
                        Pasien tidak ditemukan.
                        <a href="<?= base_url('perawat/pasien/tambah') ?>">Tambah pasien baru?</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Form Registrasi -->
    <div class="col-md-7">
        <div class="card card-outline card-warning">
            <div class="card-header"><h3 class="card-title mb-0"><i class="fas fa-clipboard-list me-2"></i>Form Registrasi Pemeriksaan</h3></div>
            <div class="card-body">
                <form action="<?= base_url('perawat/pemeriksaan/simpan') ?>" method="post" id="formRegistrasi">
                    <?= csrf_field() ?>

                    <!-- Data Pasien (diisi otomatis setelah dipilih) -->
                    <input type="hidden" name="id_pasien" id="id_pasien" value="">
                    <div class="mb-3">
                        <label class="form-label">Pasien Terpilih</label>
                        <input type="text" id="info_pasien" class="form-control" placeholder="Pilih pasien dari hasil pencarian..." readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Dokter <span class="text-danger">*</span></label>
                        <select name="id_dokter" class="form-select" required>
                            <option value="">-- Pilih Dokter --</option>
                            <?php foreach ($dokter as $d): ?>
                                <option value="<?= $d['id_pegawai'] ?>"><?= esc($d['nama_pegawai']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keluhan Utama Pasien <span class="text-danger">*</span></label>
                        <textarea name="keluhan_utama" class="form-control" rows="4" required
                                  placeholder="Tuliskan keluhan utama yang disampaikan pasien..."><?= old('keluhan_utama') ?></textarea>
                    </div>

                    <hr>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning fw-semibold"
                                onclick="if(!document.getElementById('id_pasien').value){ alert('Silakan pilih pasien terlebih dahulu!'); return false; }">
                            <i class="fas fa-save me-1"></i> Simpan Registrasi
                        </button>
                        <a href="<?= base_url('perawat/pemeriksaan') ?>" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function pilihPasien(id, noRm, nama, jenisKelamin) {
    document.getElementById('id_pasien').value = id;
    document.getElementById('info_pasien').value = nama + ' | No. RM: ' + noRm + ' | ' + jenisKelamin;
}
</script>

<?= $this->endSection() ?>
