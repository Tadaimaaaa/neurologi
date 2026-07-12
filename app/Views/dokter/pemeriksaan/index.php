<?= $this->extend('layouts/dokter') ?>
<?= $this->section('content') ?>

<div class="card card-outline card-warning">
    <div class="card-header">
        <h3 class="card-title mb-0"><i class="fas fa-clock me-2"></i>Daftar Pasien Menunggu Pemeriksaan</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm">
                <thead class="table-warning">
                    <tr>
                        <th>No</th>
                        <th>Tgl Daftar</th>
                        <th>No. RM</th>
                        <th>Nama Pasien</th>
                        <th>Perawat</th>
                        <th>Keluhan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($pemeriksaan)): ?>
                        <tr><td colspan="7" class="text-center text-muted">Tidak ada pasien yang menunggu pemeriksaan.</td></tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($pemeriksaan as $p): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= date('d/m/Y H:i', strtotime($p['tanggal_pemeriksaan'])) ?></td>
                                <td><span class="badge bg-info"><?= esc($p['no_rm']) ?></span></td>
                                <td><?= esc($p['nama_pasien']) ?></td>
                                <td><?= esc($p['nama_perawat'] ?? '-') ?></td>
                                <td><?= esc(mb_substr($p['keluhan_utama'], 0, 50)) ?>...</td>
                                <td>
                                    <a href="<?= base_url('dokter/pemeriksaan/periksa/' . $p['id_pemeriksaan']) ?>" class="btn btn-success btn-sm">
                                        <i class="fas fa-stethoscope me-1"></i> Periksa
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
