<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin' ?> - Sistem Neurologi RS Bhayangkara</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Modern Neurology Design System -->
    <link rel="stylesheet" href="<?= base_url('css/modern-neurology.css') ?>">
</head>
<body class="hold-transition sidebar-mini layout-fixed sidebar-admin">
<div class="wrapper">

    <!-- Navbar Modern Glass -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav align-items-center">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button" title="Toggle Sidebar">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block ms-2">
                <span class="live-clock-badge">
                    <i class="fas fa-clock"></i>
                    <span id="liveClockAdmin"><?= date('d M Y, H:i') ?></span>
                </span>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto align-items-center">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle user-profile-capsule" href="#" data-toggle="dropdown">
                    <i class="fas fa-user-shield text-primary me-2"></i>
                    <span><?= session()->get('nama_pegawai') ?></span>
                    <span class="badge bg-primary ms-2" style="font-size: 0.68rem;">Administrator</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow-sm border-0 rounded-3 mt-2">
                    <div class="px-3 py-2 border-bottom text-muted" style="font-size: 0.78rem;">
                        <div>Role Akun: <strong>Admin</strong></div>
                        <div>RS Bhayangkara Padang</div>
                    </div>
                    <a href="<?= base_url('logout') ?>" class="dropdown-item text-danger py-2 mt-1">
                        <i class="fas fa-sign-out-alt me-2"></i> Keluar Sistem
                    </a>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Sidebar Premium Dark Slate -->
    <aside class="main-sidebar sidebar-dark-primary elevation-0">
        <a href="<?= base_url('admin/dashboard') ?>" class="brand-link">
            <div class="logo-icon-wrap" style="background: linear-gradient(135deg, #2563EB, #1E40AF);">
                <i class="fas fa-hospital-alt"></i>
            </div>
            <div class="brand-text-block">
                <span class="title">NEUROLOGI RS</span>
                <span class="subtitle">BHAYANGKARA PADANG</span>
            </div>
        </a>

        <div class="sidebar">
            <nav class="mt-3">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <li class="nav-header">NAVIGASI UTAMA</li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= (uri_string() == 'admin/dashboard') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>Dashboard Klinis</p>
                        </a>
                    </li>

                    <li class="nav-header">MANAJEMEN DATA MEDIS</li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/pegawai') ?>" class="nav-link <?= (str_starts_with(uri_string(), 'admin/pegawai')) ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-user-md"></i>
                            <p>Tenaga Medis & Pegawai</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/pasien') ?>" class="nav-link <?= (str_starts_with(uri_string(), 'admin/pasien')) ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-procedures"></i>
                            <p>Data Pasien Neurologi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/penyakit') ?>" class="nav-link <?= (str_starts_with(uri_string(), 'admin/penyakit')) ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-brain"></i>
                            <p>Katalog Penyakit Saraf</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/pemeriksaan') ?>" class="nav-link <?= (str_starts_with(uri_string(), 'admin/pemeriksaan')) ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-stethoscope"></i>
                            <p>Rekam Pemeriksaan</p>
                        </a>
                    </li>

                    <li class="nav-header">PELAPORAN & ARSIF</li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/laporan') ?>" class="nav-link <?= (str_starts_with(uri_string(), 'admin/laporan')) ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-file-medical-alt"></i>
                            <p>Cetak Laporan Medis</p>
                        </a>
                    </li>

                    <li class="nav-header">AKUN PENGGUNA</li>
                    <li class="nav-item">
                        <a href="<?= base_url('logout') ?>" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header pb-3">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <div>
                        <span class="badge badge-primary mb-1">
                            <i class="fas fa-shield-alt me-1"></i> MODUL ADMINISTRATOR
                        </span>
                        <h1 class="m-0 fw-bold" style="font-size: 1.5rem; color: #0F172A;"><?= $title ?? '' ?></h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="content">
            <div class="container-fluid">
                <!-- Flash Messages Modern -->
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm border-0 d-flex align-items-center justify-content-between" role="alert" style="background:#ECFDF5; color:#047857;">
                        <div>
                            <i class="fas fa-check-circle me-2"></i>
                            <?= session()->getFlashdata('success') ?>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm border-0 d-flex align-items-center justify-content-between" role="alert" style="background:#FFF1F2; color:#BE123C;">
                        <div>
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <?= session()->getFlashdata('error') ?>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm border-0" role="alert" style="background:#FFF1F2; color:#BE123C;">
                        <div class="d-flex align-items-center mb-1">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Terdapat kesalahan pengisian data:</strong>
                        </div>
                        <ul class="mb-0 mt-1">
                            <?php foreach (session()->getFlashdata('errors') as $err): ?>
                                <li><?= $err ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </div>

    <!-- Footer Modern -->
    <footer class="main-footer d-flex align-items-center justify-content-between">
        <div>
            <strong>&copy; <?= date('Y') ?> RS Bhayangkara Padang</strong> &bull; Sistem Layanan & Rekam Medis Neurologi.
        </div>
        <div class="d-none d-sm-inline-block text-muted">
            <span class="badge bg-light text-dark border">v2.0 Modern</span>
        </div>
    </footer>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script>
    function updateClockAdmin() {
        const now = new Date();
        const options = { day: '2-digit', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit' };
        const el = document.getElementById('liveClockAdmin');
        if(el) el.textContent = now.toLocaleDateString('id-ID', options);
    }
    setInterval(updateClockAdmin, 30000);
</script>
<?= $this->renderSection('scripts') ?>
</body>
</html>
