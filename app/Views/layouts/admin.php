<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin' ?> - Sistem Neurologi RS Bhayangkara</title>
    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- Bootstrap Icons / Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .main-header { border-bottom: 1px solid #dee2e6; }
        .nav-sidebar .nav-link.active { background-color: #1a6faf !important; }
        .brand-link { background-color: #1a6faf; border-bottom: 1px solid #155a8a; }
        .brand-link:hover { background-color: #155a8a; }
        .sidebar { background-color: #1d2d44; }
        .sidebar .nav-sidebar .nav-item .nav-link { color: #c8d6e5; }
        .sidebar .nav-sidebar .nav-item .nav-link:hover { background-color: #243b55; color: #ffffff; }
        .sidebar .nav-sidebar .nav-item .nav-link.active { background-color: #1a6faf; color: #ffffff; }
        .nav-sidebar .nav-header { color: #8aaabe; font-size: 0.7rem; letter-spacing: 0.08em; }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                    <i class="fas fa-user-circle me-1"></i>
                    <?= session()->get('nama_pegawai') ?>
                    <span class="badge bg-primary ms-1" style="font-size: 0.65rem;">Admin</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="<?= base_url('logout') ?>" class="dropdown-item">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #1d2d44;">
        <a href="<?= base_url('admin/dashboard') ?>" class="brand-link">
            <i class="fas fa-hospital ms-3 me-2"></i>
            <span class="brand-text font-weight-bold" style="font-size: 0.9rem;">Neurologi RS Bhayangkara</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <li class="nav-header">MENU UTAMA</li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= (uri_string() == 'admin/dashboard') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-header">KELOLA DATA</li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/pegawai') ?>" class="nav-link <?= (str_starts_with(uri_string(), 'admin/pegawai')) ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Pegawai</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/pasien') ?>" class="nav-link <?= (str_starts_with(uri_string(), 'admin/pasien')) ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-procedures"></i>
                            <p>Pasien</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/penyakit') ?>" class="nav-link <?= (str_starts_with(uri_string(), 'admin/penyakit')) ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-virus"></i>
                            <p>Penyakit</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/pemeriksaan') ?>" class="nav-link <?= (str_starts_with(uri_string(), 'admin/pemeriksaan')) ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-stethoscope"></i>
                            <p>Pemeriksaan</p>
                        </a>
                    </li>
                    <li class="nav-header">LAPORAN</li>
                    <li class="nav-item">
                        <a href="<?= base_url('admin/laporan') ?>" class="nav-link <?= (str_starts_with(uri_string(), 'admin/laporan')) ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-file-pdf"></i>
                            <p>Cetak Laporan</p>
                        </a>
                    </li>
                    <li class="nav-header">AKUN</li>
                    <li class="nav-item">
                        <a href="<?= base_url('logout') ?>" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
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
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0" style="font-size: 1.3rem;"><?= $title ?? '' ?></h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="content">
            <div class="container-fluid">
                <!-- Flash Messages -->
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i> <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i> <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <i class="fas fa-exclamation-triangle me-2"></i> <strong>Terdapat kesalahan:</strong>
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

    <!-- Footer -->
    <footer class="main-footer text-sm">
        <strong>&copy; <?= date('Y') ?> Sistem Informasi Neurologi RS Bhayangkara Padang.</strong>
        <div class="float-right d-none d-sm-inline-block">Versi 1.0</div>
    </footer>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
