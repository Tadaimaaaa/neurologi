<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title mb-0">
            <i class="fas fa-<?= $pegawai ? 'edit' : 'plus' ?> me-2"></i><?= $title ?>
        </h3>
    </div>
    <div class="card-body">
        <?php
            // Tentukan action URL berdasarkan mode tambah atau edit
            $action = $pegawai
                ? base_url('admin/pegawai/update/' . $pegawai['id_pegawai'])
                : base_url('admin/pegawai/simpan');
        ?>
        <form action="<?= $action ?>" method="post">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nama Pegawai <span class="text-danger">*</span></label>
                        <input type="text" name="nama_pegawai" class="form-control"
                               value="<?= old('nama_pegawai', $pegawai['nama_pegawai'] ?? '') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username <span class="text-danger">*</span></label>
                        <input type="text" name="username" class="form-control"
                               value="<?= old('username', $pegawai['username'] ?? '') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Password <?= $pegawai ? '<small class="text-muted">(kosongkan jika tidak diubah)</small>' : '<span class="text-danger">*</span>' ?>
                        </label>
                        <input type="password" name="password" class="form-control"
                               <?= !$pegawai ? 'required' : '' ?> placeholder="<?= $pegawai ? 'Isi jika ingin mengubah password' : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No. HP</label>
                        <input type="text" name="no_hp" class="form-control"
                               value="<?= old('no_hp', $pegawai['no_hp'] ?? '') ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Role <span class="text-danger">*</span></label>
                        <select name="role" class="form-select" required>
                            <option value="">-- Pilih Role --</option>
                            <?php foreach (['admin', 'dokter', 'perawat'] as $role): ?>
                                <option value="<?= $role ?>"
                                    <?= old('role', $pegawai['role'] ?? '') == $role ? 'selected' : '' ?>>
                                    <?= ucfirst($role) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <?php foreach (['Laki-laki', 'Perempuan'] as $jk): ?>
                                <option value="<?= $jk ?>"
                                    <?= old('jenis_kelamin', $pegawai['jenis_kelamin'] ?? '') == $jk ? 'selected' : '' ?>>
                                    <?= $jk ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-select" required>
                            <?php foreach (['Aktif', 'Tidak Aktif'] as $st): ?>
                                <option value="<?= $st ?>"
                                    <?= old('status', $pegawai['status'] ?? 'Aktif') == $st ? 'selected' : '' ?>>
                                    <?= $st ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3"><?= old('alamat', $pegawai['alamat'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>
            <hr>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
                <a href="<?= base_url('admin/pegawai') ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
