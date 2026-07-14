<?= $this->extend('layouts/dokter') ?>
<?= $this->section('content') ?>

<!-- Hero Welcome Banner Dokter -->
<div class="welcome-hero-banner mb-4" style="background: linear-gradient(135deg, #064E3B 0%, #047857 100%);">
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 position-relative" style="z-index: 2;">
        <div>
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3" style="background: rgba(255,255,255,0.15); backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.22);">
                <i class="fas fa-heartbeat text-warning" style="font-size: 0.7rem;"></i>
                <span style="font-size: 0.78rem; font-weight: 600; letter-spacing: 0.04em;">PORTAL KLINIS DOKTER SPESIALIS</span>
            </div>
            <h2 class="hero-title">Selamat Datang, dr. <?= session()->get('nama_pegawai') ?></h2>
            <p class="hero-subtitle mb-0">
                Pantau antrian pasien saraf hari ini, lakukan rekam pemeriksaan klinis, diagnosis ICD, dan resepkan terapi secara profesional.
            </p>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a href="<?= base_url('dokter/pemeriksaan') ?>" class="btn btn-light text-success fw-semibold px-4 py-2 shadow-sm d-inline-flex align-items-center gap-2">
                <i class="fas fa-stethoscope"></i> Mulai Pemeriksaan
            </a>
            <a href="<?= base_url('dokter/riwayat') ?>" class="btn btn-outline-light fw-semibold px-4 py-2 d-inline-flex align-items-center gap-2">
                <i class="fas fa-history"></i> Riwayat Pasien
            </a>
        </div>
    </div>
</div>

<!-- Modern Stat Cards Grid -->
<div class="row g-4 mb-4">
    <div class="col-xl-4 col-md-6">
        <div class="stat-card-modern stat-theme-emerald">
            <div>
                <div class="stat-header">
                    <span class="stat-label">Pasien Terdaftar Hari Ini</span>
                    <div class="stat-icon-circle">
                        <i class="fas fa-procedures"></i>
                    </div>
                </div>
                <div class="stat-value mt-2"><?= $jumlah_pasien_hari_ini ?></div>
            </div>
            <div class="stat-footer">
                <span class="text-muted" style="font-size: 0.78rem;">Jadwal Pemeriksaan Hari Ini</span>
                <a href="<?= base_url('dokter/pemeriksaan') ?>" class="stat-action">
                    Lihat Antrian <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6">
        <div class="stat-card-modern stat-theme-amber">
            <div>
                <div class="stat-header">
                    <span class="stat-label">Menunggu Pemeriksaan</span>
                    <div class="stat-icon-circle">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
                <div class="stat-value mt-2"><?= $jumlah_menunggu ?></div>
            </div>
            <div class="stat-footer">
                <span class="text-muted" style="font-size: 0.78rem;">Pasien Dalam Antrian Aktif</span>
                <a href="<?= base_url('dokter/pemeriksaan') ?>" class="stat-action">
                    Periksa Sekarang <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-12">
        <div class="stat-card-modern stat-theme-blue">
            <div>
                <div class="stat-header">
                    <span class="stat-label">Arsip Riwayat Klinis</span>
                    <div class="stat-icon-circle">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                </div>
                <div class="stat-value mt-2" style="font-size: 1.5rem; line-height: 2.2rem;">Rekam Medis</div>
            </div>
            <div class="stat-footer">
                <span class="text-muted" style="font-size: 0.78rem;">Catatan Diagnosis & Terapi</span>
                <a href="<?= base_url('dokter/riwayat') ?>" class="stat-action">
                    Lihat Semua Riwayat <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Profil & Informasi Praktek Dokter -->
<div class="card mb-0">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-info-circle text-success"></i>
            Informasi Praktik & Layanan Dokter
        </h3>
        <span class="badge badge-success">Praktek Aktif</span>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="p-3 rounded-3" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                    <div class="text-muted mb-1" style="font-size: 0.75rem; text-transform: uppercase; font-weight: 700;">DOKTER SPESIALIS</div>
                    <div class="fw-bold" style="font-size: 1rem; color: #0F172A;"><?= session()->get('nama_pegawai') ?></div>
                    <div class="text-muted mt-1" style="font-size: 0.85rem;">Divisi Saraf / Neurologi</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 rounded-3" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                    <div class="text-muted mb-1" style="font-size: 0.75rem; text-transform: uppercase; font-weight: 700;">UNIT PELAYANAN</div>
                    <div class="fw-bold" style="font-size: 1rem; color: #0F172A;">RS Bhayangkara Padang</div>
                    <div class="text-muted mt-1" style="font-size: 0.85rem;">Poliklinik Neurologi</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 rounded-3" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                    <div class="text-muted mb-1" style="font-size: 0.75rem; text-transform: uppercase; font-weight: 700;">TANGGAL & HARI INI</div>
                    <div class="fw-bold" style="font-size: 1rem; color: #0F172A;"><?= date('l, d F Y') ?></div>
                    <div class="text-muted mt-1" style="font-size: 0.85rem;">Sistem Antrian & Rekam Medis Terhubung</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
