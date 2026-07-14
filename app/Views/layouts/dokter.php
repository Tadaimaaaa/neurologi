<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dokter' ?> - Sistem Neurologi RS Bhayangkara</title>
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
<body class="hold-transition sidebar-mini layout-fixed sidebar-dokter">
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
                <span class="live-clock-badge" style="background:#ECFDF5; color:#047857; border-color:#D1FAE5;">
                    <i class="fas fa-clock"></i>
                    <span id="liveClockDokter"><?= date('d M Y, H:i') ?></span>
                </span>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto align-items-center">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle user-profile-capsule" href="#" data-toggle="dropdown">
                    <i class="fas fa-user-md text-success me-2"></i>
                    <span><?= session()->get('nama_pegawai') ?></span>
                    <span class="badge bg-success ms-2" style="font-size: 0.68rem;">Dokter Spesialis</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow-sm border-0 rounded-3 mt-2">
                    <div class="px-3 py-2 border-bottom text-muted" style="font-size: 0.78rem;">
                        <div>Role Akun: <strong>Dokter</strong></div>
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
        <a href="<?= base_url('dokter/dashboard') ?>" class="brand-link">
            <div class="logo-icon-wrap" style="background: linear-gradient(135deg, #059669, #047857);">
                <i class="fas fa-heartbeat"></i>
            </div>
            <div class="brand-text-block">
                <span class="title">PORTAL DOKTER</span>
                <span class="subtitle">NEUROLOGI KLINIS</span>
            </div>
        </a>

        <div class="sidebar">
            <nav class="mt-3">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <li class="nav-header">NAVIGASI UTAMA</li>
                    <li class="nav-item">
                        <a href="<?= base_url('dokter/dashboard') ?>" class="nav-link <?= (uri_string() == 'dokter/dashboard') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>Dashboard Dokter</p>
                        </a>
                    </li>
                    <li class="nav-header">LAYANAN PEMERIKSAAN</li>
                    <li class="nav-item">
                        <a href="<?= base_url('dokter/pemeriksaan') ?>" class="nav-link <?= (uri_string() == 'dokter/pemeriksaan') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-stethoscope"></i>
                            <p>Antrian Pemeriksaan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('dokter/riwayat') ?>" class="nav-link <?= (str_starts_with(uri_string(), 'dokter/riwayat')) ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-history"></i>
                            <p>Riwayat Pemeriksaan</p>
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
                        <span class="badge badge-success mb-1">
                            <i class="fas fa-user-md me-1"></i> MODUL DOKTER NEUROLOGI
                        </span>
                        <h1 class="m-0 fw-bold" style="font-size: 1.5rem; color: #0F172A;"><?= $title ?? '' ?></h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="content">
            <div class="container-fluid">
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm border-0 d-flex align-items-center justify-content-between" role="alert" style="background:#ECFDF5; color:#047857;">
                        <div>
                            <i class="fas fa-check-circle me-2"></i> <?= session()->getFlashdata('success') ?>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm border-0 d-flex align-items-center justify-content-between" role="alert" style="background:#FFF1F2; color:#BE123C;">
                        <div>
                            <i class="fas fa-exclamation-circle me-2"></i> <?= session()->getFlashdata('error') ?>
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
            <strong>&copy; <?= date('Y') ?> RS Bhayangkara Padang</strong> &bull; Portal Medis Dokter Neurologi.
        </div>
        <div class="d-none d-sm-inline-block text-muted">
            <span class="badge bg-light text-dark border">v2.0 Modern</span>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script>
    function updateClockDokter() {
        const now = new Date();
        const options = { day: '2-digit', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit' };
        const el = document.getElementById('liveClockDokter');
        if(el) el.textContent = now.toLocaleDateString('id-ID', options);
    }
    setInterval(updateClockDokter, 30000);
</script>
<?= $this->renderSection('scripts') ?>
</body>
</html>
