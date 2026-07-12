<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="card card-outline card-danger">
    <div class="card-header">
        <h3 class="card-title mb-0"><i class="fas fa-<?= $penyakit ? 'edit' : 'plus' ?> me-2"></i><?= $title ?></h3>
    </div>
    <div class="card-body">
        <?php
            $action = $penyakit
                ? base_url('admin/penyakit/update/' . $penyakit['id_penyakit'])
                : base_url('admin/penyakit/simpan');
        ?>
        <form action="<?= $action ?>" method="post" style="max-width: 600px;">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label class="form-label">Nama Penyakit <span class="text-danger">*</span></label>
                <input type="text" name="nama_penyakit" class="form-control"
                       value="<?= old('nama_penyakit', $penyakit['nama_penyakit'] ?? '') ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="4"><?= old('keterangan', $penyakit['keterangan'] ?? '') ?></textarea>
            </div>
            <hr>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-danger"><i class="fas fa-save me-1"></i> Simpan</button>
                <a href="<?= base_url('admin/penyakit') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Kembali</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
