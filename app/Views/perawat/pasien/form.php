<?= $this->extend('layouts/perawat') ?>
<?= $this->section('content') ?>

<div class="card card-outline" style="border-color:#5f4bb6;">
    <div class="card-header">
        <h3 class="card-title mb-0"><i class="fas fa-<?= $pasien ? 'edit' : 'plus' ?> me-2"></i><?= $title ?></h3>
    </div>
    <div class="card-body">
        <?php
            $action = $pasien
                ? base_url('perawat/pasien/update/' . $pasien['id_pasien'])
                : base_url('perawat/pasien/simpan');
        ?>
        <form action="<?= $action ?>" method="post">
            <?= csrf_field() ?>
            <?php if ($pasien): ?>
                <div class="mb-3">
                    <label class="form-label">No. Rekam Medis</label>
                    <input type="text" class="form-control" value="<?= esc($pasien['no_rm']) ?>" disabled>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nama Pasien <span class="text-danger">*</span></label>
                        <input type="text" name="nama_pasien" class="form-control"
                               value="<?= old('nama_pasien', $pasien['nama_pasien'] ?? '') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NIK</label>
                        <input type="text" name="nik" class="form-control" maxlength="16"
                               value="<?= old('nik', $pasien['nik'] ?? '') ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <?php foreach (['Laki-laki', 'Perempuan'] as $jk): ?>
                                <option value="<?= $jk ?>"
                                    <?= old('jenis_kelamin', $pasien['jenis_kelamin'] ?? '') == $jk ? 'selected' : '' ?>>
                                    <?= $jk ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control"
                               value="<?= old('tanggal_lahir', $pasien['tanggal_lahir'] ?? '') ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Golongan Darah <span class="text-danger">*</span></label>
                        <select name="golongan_darah" class="form-select" required>
                            <?php foreach (['A', 'B', 'AB', 'O', 'Tidak Diketahui'] as $gb): ?>
                                <option value="<?= $gb ?>"
                                    <?= old('golongan_darah', $pasien['golongan_darah'] ?? 'Tidak Diketahui') == $gb ? 'selected' : '' ?>>
                                    <?= $gb ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No. HP</label>
                        <input type="text" name="no_hp" class="form-control"
                               value="<?= old('no_hp', $pasien['no_hp'] ?? '') ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="4"><?= old('alamat', $pasien['alamat'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>
            <hr>
            <div class="d-flex gap-2">
                <button type="submit" class="btn" style="background-color:#5f4bb6; color:white;">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
                <a href="<?= base_url('perawat/pasien') ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
