<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="card card-outline card-primary">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0"><i class="fas fa-users me-2"></i>Daftar Pegawai</h3>
        <a href="<?= base_url('admin/pegawai/tambah') ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus me-1"></i> Tambah Pegawai
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm">
                <thead class="table-primary">
                    <tr>
                        <th width="40">No</th>
                        <th>Nama Pegawai</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Jenis Kelamin</th>
                        <th>No. HP</th>
                        <th>Status</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($pegawai)): ?>
                        <tr><td colspan="8" class="text-center text-muted">Belum ada data pegawai.</td></tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($pegawai as $p): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= esc($p['nama_pegawai']) ?></td>
                                <td><code><?= esc($p['username']) ?></code></td>
                                <td>
                                    <?php
                                        $badgeClass = match($p['role']) {
                                            'admin'   => 'bg-primary',
                                            'dokter'  => 'bg-success',
                                            'perawat' => 'bg-purple',
                                            default   => 'bg-secondary',
                                        };
                                    ?>
                                    <span class="badge <?= $badgeClass ?>"><?= ucfirst($p['role']) ?></span>
                                </td>
                                <td><?= esc($p['jenis_kelamin']) ?></td>
                                <td><?= esc($p['no_hp'] ?? '-') ?></td>
                                <td>
                                    <span class="badge <?= $p['status'] == 'Aktif' ? 'bg-success' : 'bg-secondary' ?>">
                                        <?= $p['status'] ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/pegawai/edit/' . $p['id_pegawai']) ?>" class="btn btn-warning btn-xs">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <?php if ($p['id_pegawai'] != session()->get('id_pegawai')): ?>
                                        <a href="<?= base_url('admin/pegawai/hapus/' . $p['id_pegawai']) ?>"
                                           class="btn btn-danger btn-xs"
                                           onclick="return confirm('Yakin hapus pegawai ini?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    <?php endif; ?>
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
