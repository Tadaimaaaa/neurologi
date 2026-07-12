<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<!-- Filter Form -->
<div class="card card-outline card-secondary">
    <div class="card-header"><h3 class="card-title mb-0"><i class="fas fa-filter me-2"></i>Filter Laporan</h3></div>
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
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Tampilkan</button>
                <a href="<?= base_url('admin/laporan') ?>" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>
</div>

<!-- Preview Laporan -->
<?php if (!empty($pemeriksaan)): ?>
<div class="card card-outline card-primary">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0"><i class="fas fa-list me-2"></i>Preview Laporan (<?= count($pemeriksaan) ?> data)</h3>
        <a href="<?= base_url('admin/laporan/cetak?' . http_build_query(['dari' => $dari, 'sampai' => $sampai, 'status' => $status])) ?>"
           class="btn btn-danger btn-sm" target="_blank">
            <i class="fas fa-file-pdf me-1"></i> Cetak PDF
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Tgl Periksa</th>
                        <th>No. RM</th>
                        <th>Nama Pasien</th>
                        <th>Dokter</th>
                        <th>Diagnosa</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($pemeriksaan as $p): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= date('d/m/Y', strtotime($p['tanggal_pemeriksaan'])) ?></td>
                            <td><?= esc($p['no_rm']) ?></td>
                            <td><?= esc($p['nama_pasien']) ?></td>
                            <td><?= esc($p['nama_dokter'] ?? '-') ?></td>
                            <td><?= esc($p['nama_penyakit'] ?? '-') ?></td>
                            <td><?= $p['status'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php elseif (isset($dari) || isset($sampai) || isset($status)): ?>
    <div class="alert alert-info"><i class="fas fa-info-circle me-2"></i>Tidak ada data yang sesuai dengan filter.</div>
<?php else: ?>
    <div class="alert alert-secondary"><i class="fas fa-info-circle me-2"></i>Gunakan filter di atas untuk menampilkan laporan.</div>
<?php endif; ?>

<?= $this->endSection() ?>
