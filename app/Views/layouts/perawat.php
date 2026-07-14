<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Perawat' ?> - Sistem Neurologi RS Bhayangkara</title>
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
<body class="hold-transition sidebar-mini layout-fixed sidebar-perawat">
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
                <span class="live-clock-badge" style="background:#F5F3FF; color:#6D28D9; border-color:#EDE9FE;">
                    <i class="fas fa-clock"></i>
                    <span id="liveClockPerawat"><?= date('d M Y, H:i') ?></span>
                </span>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto align-items-center">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle user-profile-capsule" href="#" data-toggle="dropdown">
                    <i class="fas fa-user-nurse me-2" style="color: #7C3AED;"></i>
                    <span><?= session()->get('nama_pegawai') ?></span>
                    <span class="badge ms-2" style="background-color:#7C3AED; font-size: 0.68rem;">Perawat Klinis</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow-sm border-0 rounded-3 mt-2">
                    <div class="px-3 py-2 border-bottom text-muted" style="font-size: 0.78rem;">
                        <div>Role Akun: <strong>Perawat</strong></div>
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
        <a href="<?= base_url('perawat/dashboard') ?>" class="brand-link">
            <div class="logo-icon-wrap" style="background: linear-gradient(135deg, #7C3AED, #6D28D9);">
                <i class="fas fa-notes-medical"></i>
            </div>
            <div class="brand-text-block">
                <span class="title">PORTAL PERAWAT</span>
                <span class="subtitle">NEUROLOGI KLINIS</span>
            </div>
        </a>

        <div class="sidebar">
            <nav class="mt-3">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <li class="nav-header">NAVIGASI UTAMA</li>
                    <li class="nav-item">
                        <a href="<?= base_url('perawat/dashboard') ?>" class="nav-link <?= (uri_string() == 'perawat/dashboard') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>Dashboard Perawat</p>
                        </a>
                    </li>
                    <li class="nav-header">MANAJEMEN PASIEN</li>
                    <li class="nav-item">
                        <a href="<?= base_url('perawat/pasien') ?>" class="nav-link <?= (str_starts_with(uri_string(), 'perawat/pasien')) ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-procedures"></i>
                            <p>Data Pasien</p>
                        </a>
                    </li>
                    <li class="nav-header">LAYANAN PEMERIKSAAN</li>
                    <li class="nav-item">
                        <a href="<?= base_url('perawat/pemeriksaan/registrasi') ?>" class="nav-link <?= (uri_string() == 'perawat/pemeriksaan/registrasi') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>Registrasi Pemeriksaan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('perawat/pemeriksaan') ?>" class="nav-link <?= (uri_string() == 'perawat/pemeriksaan') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-notes-medical"></i>
                            <p>Data Pemeriksaan</p>
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
                        <span class="badge mb-1" style="background:#F5F3FF; color:#6D28D9; border:1px solid #EDE9FE;">
                            <i class="fas fa-user-nurse me-1"></i> MODUL PERAWAT NEUROLOGI
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
            <strong>&copy; <?= date('Y') ?> RS Bhayangkara Padang</strong> &bull; Portal Medis Perawat Neurologi.
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
    function updateClockPerawat() {
        const now = new Date();
        const options = { day: '2-digit', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit' };
        const el = document.getElementById('liveClockPerawat');
        if(el) el.textContent = now.toLocaleDateString('id-ID', options);
    }
    setInterval(updateClockPerawat, 30000);
</script>
<?= $this->renderSection('scripts') ?>
</body>
</html>
