<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3><?= $jumlah_pegawai ?></h3>
                <p>Total Pegawai</p>
            </div>
            <div class="icon"><i class="fas fa-users"></i></div>
            <a href="<?= base_url('admin/pegawai') ?>" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $jumlah_pasien ?></h3>
                <p>Total Pasien</p>
            </div>
            <div class="icon"><i class="fas fa-procedures"></i></div>
            <a href="<?= base_url('admin/pasien') ?>" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $jumlah_pemeriksaan ?></h3>
                <p>Total Pemeriksaan</p>
            </div>
            <div class="icon"><i class="fas fa-stethoscope"></i></div>
            <a href="<?= base_url('admin/pemeriksaan') ?>" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $jumlah_penyakit ?></h3>
                <p>Total Penyakit</p>
            </div>
            <div class="icon"><i class="fas fa-virus"></i></div>
            <a href="<?= base_url('admin/penyakit') ?>" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-info-circle me-2"></i>Informasi Sistem</h3>
            </div>
            <div class="card-body">
                <p class="mb-1"><strong>Nama Sistem:</strong> Sistem Informasi Layanan Neurologi</p>
                <p class="mb-1"><strong>Instansi:</strong> RS Bhayangkara Padang</p>
                <p class="mb-1"><strong>Anda Login Sebagai:</strong> <?= session()->get('nama_pegawai') ?> (Admin)</p>
                <p class="mb-0"><strong>Tanggal:</strong> <?= date('d/m/Y H:i') ?></p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
