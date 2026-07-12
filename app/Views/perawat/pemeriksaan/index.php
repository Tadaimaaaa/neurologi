<?= $this->extend('layouts/perawat') ?>
<?= $this->section('content') ?>

<div class="card card-outline" style="border-color:#5f4bb6;">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0"><i class="fas fa-notes-medical me-2"></i>Data Pemeriksaan Saya</h3>
        <a href="<?= base_url('perawat/pemeriksaan/registrasi') ?>" class="btn btn-sm" style="background-color:#5f4bb6; color:white;">
            <i class="fas fa-plus me-1"></i> Registrasi Baru
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm">
                <thead style="background-color:#5f4bb6; color:white;">
                    <tr>
                        <th>No</th>
                        <th>Tgl Periksa</th>
                        <th>No. RM</th>
                        <th>Nama Pasien</th>
                        <th>Dokter</th>
                        <th>Diagnosa</th>
                        <th>Status</th>
                        <th>Resep</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($pemeriksaan)): ?>
                        <tr><td colspan="9" class="text-center text-muted">Belum ada data pemeriksaan.</td></tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($pemeriksaan as $p): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= date('d/m/Y H:i', strtotime($p['tanggal_pemeriksaan'])) ?></td>
                                <td><span class="badge bg-info"><?= esc($p['no_rm']) ?></span></td>
                                <td><?= esc($p['nama_pasien']) ?></td>
                                <td><?= esc($p['nama_dokter'] ?? '-') ?></td>
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
                                    <a href="<?= base_url('perawat/pemeriksaan/detail/' . $p['id_pemeriksaan']) ?>" class="btn btn-info btn-xs" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <?php if ($p['status'] == 'Selesai' && $p['status_resep'] == 'Belum Diajukan'): ?>
                                        <a href="<?= base_url('perawat/pemeriksaan/ajukan-resep/' . $p['id_pemeriksaan']) ?>"
                                           class="btn btn-success btn-xs"
                                           title="Ajukan Resep"
                                           onclick="return confirm('Ajukan resep ke apotek?')">
                                            <i class="fas fa-prescription-bottle"></i>
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
