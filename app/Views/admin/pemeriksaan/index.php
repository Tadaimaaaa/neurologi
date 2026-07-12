<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<!-- Form Filter -->
<div class="card card-outline card-secondary">
    <div class="card-header"><h3 class="card-title mb-0"><i class="fas fa-filter me-2"></i>Filter Data</h3></div>
    <div class="card-body">
        <form action="" method="get" class="row g-2">
            <div class="col-md-3">
                <label class="form-label">Dari Tanggal</label>
                <input type="date" name="dari" class="form-control" value="<?= esc($dari ?? '') ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label">Sampai Tanggal</label>
                <input type="date" name="sampai" class="form-control" value="<?= esc($sampai ?? '') ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">-- Semua Status --</option>
                    <?php foreach (['Menunggu Dokter', 'Selesai', 'Kontrol'] as $s): ?>
                        <option value="<?= $s ?>" <?= ($status ?? '') == $s ? 'selected' : '' ?>><?= $s ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end gap-2">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Filter</button>
                <a href="<?= base_url('admin/pemeriksaan') ?>" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>
</div>

<!-- Tabel Pemeriksaan -->
<div class="card card-outline card-warning">
    <div class="card-header"><h3 class="card-title mb-0"><i class="fas fa-stethoscope me-2"></i>Data Pemeriksaan (<?= count($pemeriksaan) ?> data)</h3></div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm">
                <thead class="table-warning">
                    <tr>
                        <th>No</th>
                        <th>Tgl Periksa</th>
                        <th>No. RM</th>
                        <th>Nama Pasien</th>
                        <th>Dokter</th>
                        <th>Perawat</th>
                        <th>Penyakit</th>
                        <th>Status</th>
                        <th>Resep</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($pemeriksaan)): ?>
                        <tr><td colspan="10" class="text-center text-muted">Tidak ada data pemeriksaan.</td></tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($pemeriksaan as $p): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= date('d/m/Y H:i', strtotime($p['tanggal_pemeriksaan'])) ?></td>
                                <td><span class="badge bg-info"><?= esc($p['no_rm']) ?></span></td>
                                <td><?= esc($p['nama_pasien']) ?></td>
                                <td><?= esc($p['nama_dokter'] ?? '-') ?></td>
                                <td><?= esc($p['nama_perawat'] ?? '-') ?></td>
                                <td><?= esc($p['nama_penyakit'] ?? '-') ?></td>
                                <td>
                                    <?php
                                        $sc = match($p['status']) {
                                            'Menunggu Dokter' => 'bg-warning text-dark',
                                            'Selesai'         => 'bg-success',
                                            'Kontrol'         => 'bg-info',
                                            default           => 'bg-secondary',
                                        };
                                    ?>
                                    <span class="badge <?= $sc ?>"><?= $p['status'] ?></span>
                                </td>
                                <td>
                                    <span class="badge <?= $p['status_resep'] == 'Sudah Diajukan' ? 'bg-success' : 'bg-secondary' ?>">
                                        <?= $p['status_resep'] ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/pemeriksaan/detail/' . $p['id_pemeriksaan']) ?>" class="btn btn-info btn-xs">
                                        <i class="fas fa-eye"></i>
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
