<?= $this->extend('layouts/perawat') ?>
<?= $this->section('content') ?>

<!-- Hero Welcome Banner Perawat -->
<div class="welcome-hero-banner mb-4" style="background: linear-gradient(135deg, #4C1D95 0%, #6D28D9 100%);">
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 position-relative" style="z-index: 2;">
        <div>
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3" style="background: rgba(255,255,255,0.15); backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.22);">
                <i class="fas fa-user-nurse text-warning" style="font-size: 0.7rem;"></i>
                <span style="font-size: 0.78rem; font-weight: 600; letter-spacing: 0.04em;">PORTAL PERAWAT KLINIS NEUROLOGI</span>
            </div>
            <h2 class="hero-title">Selamat Datang, <?= session()->get('nama_pegawai') ?></h2>
            <p class="hero-subtitle mb-0">
                Kelola pendaftaran pasien, ukur tanda vital awal (tensi, nadi, suhu), registrasi pemeriksaan saraf, dan kelola resep obat pasien.
            </p>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a href="<?= base_url('perawat/pemeriksaan/registrasi') ?>" class="btn btn-light fw-semibold px-4 py-2 shadow-sm d-inline-flex align-items-center gap-2" style="color: #6D28D9;">
                <i class="fas fa-plus-circle"></i> Registrasi Pemeriksaan
            </a>
            <a href="<?= base_url('perawat/pasien') ?>" class="btn btn-outline-light fw-semibold px-4 py-2 d-inline-flex align-items-center gap-2">
                <i class="fas fa-procedures"></i> Data Pasien
            </a>
        </div>
    </div>
</div>

<!-- Modern Stat Cards Grid -->
<div class="row g-4 mb-4">
    <div class="col-xl-4 col-md-6">
        <div class="stat-card-modern stat-theme-purple">
            <div>
                <div class="stat-header">
                    <span class="stat-label">Total Pasien Terdaftar</span>
                    <div class="stat-icon-circle">
                        <i class="fas fa-procedures"></i>
                    </div>
                </div>
                <div class="stat-value mt-2"><?= $jumlah_pasien ?></div>
            </div>
            <div class="stat-footer">
                <span class="text-muted" style="font-size: 0.78rem;">Database Pasien Neurologi</span>
                <a href="<?= base_url('perawat/pasien') ?>" class="stat-action">
                    Kelola Pasien <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6">
        <div class="stat-card-modern stat-theme-amber">
            <div>
                <div class="stat-header">
                    <span class="stat-label">Pemeriksaan Hari Ini</span>
                    <div class="stat-icon-circle">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                </div>
                <div class="stat-value mt-2"><?= $pemeriksaan_hari_ini ?></div>
            </div>
            <div class="stat-footer">
                <span class="text-muted" style="font-size: 0.78rem;">Kunjungan & Pemeriksaan</span>
                <a href="<?= base_url('perawat/pemeriksaan') ?>" class="stat-action">
                    Lihat Data <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-12">
        <div class="stat-card-modern stat-theme-rose">
            <div>
                <div class="stat-header">
                    <span class="stat-label">Resep Belum Diajukan</span>
                    <div class="stat-icon-circle">
                        <i class="fas fa-prescription-bottle-alt"></i>
                    </div>
                </div>
                <div class="stat-value mt-2"><?= $resep_belum_diajukan ?></div>
            </div>
            <div class="stat-footer">
                <span class="text-muted" style="font-size: 0.78rem;">Menunggu Pengajuan Farmasi</span>
                <a href="<?= base_url('perawat/pemeriksaan') ?>" class="stat-action">
                    Ajukan Sekarang <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Profil & Layanan Keperawatan -->
<div class="card mb-0">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-notes-medical" style="color: #7C3AED;"></i>
            Status Layanan Perawat Neurologi
        </h3>
        <span class="badge" style="background:#F5F3FF; color:#6D28D9; border:1px solid #EDE9FE;">Perawat Klinis</span>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="p-3 rounded-3" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                    <div class="text-muted mb-1" style="font-size: 0.75rem; text-transform: uppercase; font-weight: 700;">PERAWAT BERTUGAS</div>
                    <div class="fw-bold" style="font-size: 1rem; color: #0F172A;"><?= session()->get('nama_pegawai') ?></div>
                    <div class="text-muted mt-1" style="font-size: 0.85rem;">Keperawatan Neurologi Klinis</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 rounded-3" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                    <div class="text-muted mb-1" style="font-size: 0.75rem; text-transform: uppercase; font-weight: 700;">FASILITAS LAYANAN</div>
                    <div class="fw-bold" style="font-size: 1rem; color: #0F172A;">RS Bhayangkara Padang</div>
                    <div class="text-muted mt-1" style="font-size: 0.85rem;">Poliklinik & Rawat Spesialis Saraf</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 rounded-3" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                    <div class="text-muted mb-1" style="font-size: 0.75rem; text-transform: uppercase; font-weight: 700;">TANGGAL BERTUGAS</div>
                    <div class="fw-bold" style="font-size: 1rem; color: #0F172A;"><?= date('l, d F Y') ?></div>
                    <div class="text-muted mt-1" style="font-size: 0.85rem;">Sistem Informasi Neurologi Aktif</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
