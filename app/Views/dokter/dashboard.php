<?= $this->extend('layouts/dokter') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-4 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $jumlah_pasien_hari_ini ?></h3>
                <p>Pasien Saya Hari Ini</p>
            </div>
            <div class="icon"><i class="fas fa-procedures"></i></div>
            <a href="<?= base_url('dokter/pemeriksaan') ?>" class="small-box-footer">Lihat Antrian <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $jumlah_menunggu ?></h3>
                <p>Menunggu Pemeriksaan</p>
            </div>
            <div class="icon"><i class="fas fa-clock"></i></div>
            <a href="<?= base_url('dokter/pemeriksaan') ?>" class="small-box-footer">Periksa Sekarang <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><i class="fas fa-history" style="font-size:1.8rem;"></i></h3>
                <p>Riwayat Pemeriksaan</p>
            </div>
            <div class="icon"><i class="fas fa-clipboard-list"></i></div>
            <a href="<?= base_url('dokter/riwayat') ?>" class="small-box-footer">Lihat Riwayat <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<div class="card card-outline card-success">
    <div class="card-header">
        <h3 class="card-title mb-0"><i class="fas fa-info-circle me-2"></i>Informasi</h3>
    </div>
    <div class="card-body">
        <p class="mb-1">Selamat datang, <strong><?= session()->get('nama_pegawai') ?></strong>.</p>
        <p class="mb-0">Tanggal: <?= date('l, d F Y H:i') ?></p>
    </div>
</div>

<?= $this->endSection() ?>
