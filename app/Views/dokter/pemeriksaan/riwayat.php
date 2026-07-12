<?= $this->extend('layouts/dokter') ?>
<?= $this->section('content') ?>

<!-- Filter -->
<div class="card card-outline card-secondary">
    <div class="card-header"><h3 class="card-title mb-0"><i class="fas fa-filter me-2"></i>Filter Riwayat</h3></div>
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
            <div class="col-md-3 d-flex align-items-end gap-2">
                <button type="submit" class="btn btn-info"><i class="fas fa-search"></i> Filter</button>
                <a href="<?= base_url('dokter/riwayat') ?>" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>
</div>

<div class="card card-outline card-info">
    <div class="card-header"><h3 class="card-title mb-0"><i class="fas fa-history me-2"></i>Riwayat Pemeriksaan (<?= count($pemeriksaan) ?> data)</h3></div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm">
                <thead class="table-info">
                    <tr>
                        <th>No</th>
                        <th>Tgl Periksa</th>
                        <th>No. RM</th>
                        <th>Nama Pasien</th>
                        <th>Diagnosa</th>
                        <th>Jadwal Kontrol</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($pemeriksaan)): ?>
                        <tr><td colspan="8" class="text-center text-muted">Tidak ada riwayat pemeriksaan.</td></tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($pemeriksaan as $p): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= date('d/m/Y', strtotime($p['tanggal_pemeriksaan'])) ?></td>
                                <td><span class="badge bg-info"><?= esc($p['no_rm']) ?></span></td>
                                <td><?= esc($p['nama_pasien']) ?></td>
                                <td><?= esc($p['nama_penyakit'] ?? '-') ?></td>
                                <td><?= $p['jadwal_kontrol'] ? date('d/m/Y', strtotime($p['jadwal_kontrol'])) : '-' ?></td>
                                <td><span class="badge bg-success"><?= $p['status'] ?></span></td>
                                <td>
                                    <a href="<?= base_url('dokter/pemeriksaan/detail/' . $p['id_pemeriksaan']) ?>" class="btn btn-info btn-xs">
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
