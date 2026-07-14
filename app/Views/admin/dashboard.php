<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<!-- Hero Welcome Banner -->
<div class="welcome-hero-banner mb-4">
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 position-relative" style="z-index: 2;">
        <div>
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3" style="background: rgba(255,255,255,0.14); backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.2);">
                <i class="fas fa-circle text-info" style="font-size: 0.6rem;"></i>
                <span style="font-size: 0.78rem; font-weight: 600; letter-spacing: 0.04em;">ADMINISTRATOR SYSTEM PORTAL</span>
            </div>
            <h2 class="hero-title">Selamat Datang, <?= session()->get('nama_pegawai') ?></h2>
            <p class="hero-subtitle mb-0">
                Kelola seluruh data layanan medis saraf, tenaga medis, riwayat pemeriksaan, serta laporan klinis RS Bhayangkara Padang dalam satu dasbor terpadu.
            </p>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a href="<?= base_url('admin/pegawai') ?>" class="btn btn-light text-primary fw-semibold px-4 py-2 shadow-sm d-inline-flex align-items-center gap-2">
                <i class="fas fa-plus-circle"></i> Kelola Pegawai
            </a>
            <a href="<?= base_url('admin/laporan') ?>" class="btn btn-outline-light fw-semibold px-4 py-2 d-inline-flex align-items-center gap-2">
                <i class="fas fa-file-pdf"></i> Laporan
            </a>
        </div>
    </div>
</div>

<!-- Modern Stat Cards Grid -->
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="stat-card-modern stat-theme-blue">
            <div>
                <div class="stat-header">
                    <span class="stat-label">Tenaga Medis & Pegawai</span>
                    <div class="stat-icon-circle">
                        <i class="fas fa-user-md"></i>
                    </div>
                </div>
                <div class="stat-value mt-2"><?= $jumlah_pegawai ?></div>
            </div>
            <div class="stat-footer">
                <span class="text-muted" style="font-size: 0.78rem;">Dokter & Perawat Terdaftar</span>
                <a href="<?= base_url('admin/pegawai') ?>" class="stat-action">
                    Kelola Data <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="stat-card-modern stat-theme-emerald">
            <div>
                <div class="stat-header">
                    <span class="stat-label">Total Pasien Neurologi</span>
                    <div class="stat-icon-circle">
                        <i class="fas fa-procedures"></i>
                    </div>
                </div>
                <div class="stat-value mt-2"><?= $jumlah_pasien ?></div>
            </div>
            <div class="stat-footer">
                <span class="text-muted" style="font-size: 0.78rem;">Rekam Medis Pasien</span>
                <a href="<?= base_url('admin/pasien') ?>" class="stat-action">
                    Lihat Pasien <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="stat-card-modern stat-theme-amber">
            <div>
                <div class="stat-header">
                    <span class="stat-label">Rekam Pemeriksaan</span>
                    <div class="stat-icon-circle">
                        <i class="fas fa-stethoscope"></i>
                    </div>
                </div>
                <div class="stat-value mt-2"><?= $jumlah_pemeriksaan ?></div>
            </div>
            <div class="stat-footer">
                <span class="text-muted" style="font-size: 0.78rem;">Kunjungan & Konsultasi</span>
                <a href="<?= base_url('admin/pemeriksaan') ?>" class="stat-action">
                    Lihat Rekam <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="stat-card-modern stat-theme-rose">
            <div>
                <div class="stat-header">
                    <span class="stat-label">Katalog Penyakit Saraf</span>
                    <div class="stat-icon-circle">
                        <i class="fas fa-brain"></i>
                    </div>
                </div>
                <div class="stat-value mt-2"><?= $jumlah_penyakit ?></div>
            </div>
            <div class="stat-footer">
                <span class="text-muted" style="font-size: 0.78rem;">Diagnosis ICD & Deskripsi</span>
                <a href="<?= base_url('admin/penyakit') ?>" class="stat-action">
                    Kelola Penyakit <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- System Info & Quick Overview Panel -->
<div class="row g-4">
    <div class="col-lg-8">
        <div class="card h-100 mb-0">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-hospital text-primary"></i>
                    Profil Layanan Neurologi RS Bhayangkara
                </h3>
                <span class="badge badge-primary">Sistem Online</span>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="p-3 rounded-3" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                            <div class="text-muted mb-1" style="font-size: 0.75rem; text-transform: uppercase; font-weight: 700;">INSTANSI / RUMAH SAKIT</div>
                            <div class="fw-bold" style="font-size: 1rem; color: #0F172A;">RS Bhayangkara Padang</div>
                            <div class="text-muted mt-1" style="font-size: 0.85rem;">Pelayanan Spesialis Saraf & Neurologi Klinis</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 rounded-3" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                            <div class="text-muted mb-1" style="font-size: 0.75rem; text-transform: uppercase; font-weight: 700;">AKUN PENGGUNA AKTIF</div>
                            <div class="fw-bold" style="font-size: 1rem; color: #0F172A;"><?= session()->get('nama_pegawai') ?></div>
                            <div class="text-muted mt-1" style="font-size: 0.85rem;"><span class="badge badge-primary">Administrator Sistem</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card h-100 mb-0">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-calendar-check text-primary"></i>
                    Status Waktu & Sesi
                </h3>
            </div>
            <div class="card-body d-flex flex-column justify-content-center">
                <div class="text-center py-2">
                    <div class="mb-2">
                        <i class="fas fa-clock text-primary" style="font-size: 2.2rem; opacity: 0.8;"></i>
                    </div>
                    <div class="fw-bold" style="font-size: 1.15rem; color: #0F172A;">
                        <?= date('l, d F Y') ?>
                    </div>
                    <div class="text-muted mt-1" style="font-size: 0.85rem;">
                        Waktu Server: <strong><?= date('H:i') ?> WIB</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
