<?= $this->extend('layouts/perawat') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-4 col-6">
        <div class="small-box" style="background-color:#5f4bb6; color:white;">
            <div class="inner">
                <h3><?= $jumlah_pasien ?></h3>
                <p>Total Pasien Terdaftar</p>
            </div>
            <div class="icon"><i class="fas fa-procedures"></i></div>
            <a href="<?= base_url('perawat/pasien') ?>" class="small-box-footer text-white">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $pemeriksaan_hari_ini ?></h3>
                <p>Pemeriksaan Hari Ini</p>
            </div>
            <div class="icon"><i class="fas fa-clipboard-list"></i></div>
            <a href="<?= base_url('perawat/pemeriksaan') ?>" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $resep_belum_diajukan ?></h3>
                <p>Resep Belum Diajukan</p>
            </div>
            <div class="icon"><i class="fas fa-prescription-bottle"></i></div>
            <a href="<?= base_url('perawat/pemeriksaan') ?>" class="small-box-footer">Ajukan Sekarang <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<div class="card card-outline" style="border-color:#5f4bb6;">
    <div class="card-header"><h3 class="card-title mb-0"><i class="fas fa-info-circle me-2"></i>Informasi</h3></div>
    <div class="card-body">
        <p class="mb-1">Selamat datang, <strong><?= session()->get('nama_pegawai') ?></strong>.</p>
        <p class="mb-0">Tanggal: <?= date('l, d F Y H:i') ?></p>
    </div>
</div>

<?= $this->endSection() ?>
