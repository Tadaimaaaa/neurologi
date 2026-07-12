<?= $this->extend('layouts/perawat') ?>
<?= $this->section('content') ?>

<div class="card card-outline" style="border-color:#5f4bb6;">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0"><i class="fas fa-procedures me-2"></i>Data Pasien</h3>
        <a href="<?= base_url('perawat/pasien/tambah') ?>" class="btn btn-sm" style="background-color:#5f4bb6; color:white;">
            <i class="fas fa-plus me-1"></i> Tambah Pasien
        </a>
    </div>
    <div class="card-body">
        <form action="" method="get" class="mb-3">
            <div class="input-group" style="max-width: 400px;">
                <input type="text" name="q" class="form-control" placeholder="Cari nama, No. RM, NIK..."
                       value="<?= esc($keyword ?? '') ?>">
                <button type="submit" class="btn btn-outline-secondary"><i class="fas fa-search"></i></button>
                <?php if (!empty($keyword)): ?>
                    <a href="<?= base_url('perawat/pasien') ?>" class="btn btn-outline-danger"><i class="fas fa-times"></i></a>
                <?php endif; ?>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm">
                <thead style="background-color:#5f4bb6; color:white;">
                    <tr>
                        <th>No</th>
                        <th>No. RM</th>
                        <th>Nama Pasien</th>
                        <th>Jenis Kelamin</th>
                        <th>Tgl Lahir</th>
                        <th>No. HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($pasien)): ?>
                        <tr><td colspan="7" class="text-center text-muted">Tidak ada data pasien.</td></tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($pasien as $p): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><span class="badge bg-info"><?= esc($p['no_rm']) ?></span></td>
                                <td><?= esc($p['nama_pasien']) ?></td>
                                <td><?= esc($p['jenis_kelamin']) ?></td>
                                <td><?= $p['tanggal_lahir'] ? date('d/m/Y', strtotime($p['tanggal_lahir'])) : '-' ?></td>
                                <td><?= esc($p['no_hp'] ?? '-') ?></td>
                                <td>
                                    <a href="<?= base_url('perawat/pasien/edit/' . $p['id_pasien']) ?>" class="btn btn-warning btn-xs">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('perawat/pemeriksaan/registrasi?id_pasien=' . $p['id_pasien']) ?>"
                                       class="btn btn-xs" style="background-color:#5f4bb6; color:white;"
                                       title="Registrasi Pemeriksaan">
                                        <i class="fas fa-clipboard-list"></i>
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
