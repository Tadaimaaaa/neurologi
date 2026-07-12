<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="card card-outline card-danger">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0"><i class="fas fa-virus me-2"></i>Daftar Penyakit</h3>
        <a href="<?= base_url('admin/penyakit/tambah') ?>" class="btn btn-danger btn-sm">
            <i class="fas fa-plus me-1"></i> Tambah Penyakit
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm">
                <thead class="table-danger">
                    <tr>
                        <th width="40">No</th>
                        <th>Nama Penyakit</th>
                        <th>Keterangan</th>
                        <th width="100">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($penyakit)): ?>
                        <tr><td colspan="4" class="text-center text-muted">Belum ada data penyakit.</td></tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($penyakit as $p): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= esc($p['nama_penyakit']) ?></td>
                                <td><?= esc($p['keterangan'] ?? '-') ?></td>
                                <td>
                                    <a href="<?= base_url('admin/penyakit/edit/' . $p['id_penyakit']) ?>" class="btn btn-warning btn-xs">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('admin/penyakit/hapus/' . $p['id_penyakit']) ?>"
                                       class="btn btn-danger btn-xs"
                                       onclick="return confirm('Yakin hapus penyakit ini?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
