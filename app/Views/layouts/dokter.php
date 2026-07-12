<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dokter' ?> - Sistem Neurologi RS Bhayangkara</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .brand-link { background-color: #17754a; border-bottom: 1px solid #125c3b; }
        .sidebar { background-color: #1d2d1d; }
        .sidebar .nav-sidebar .nav-item .nav-link { color: #c8e0d0; }
        .sidebar .nav-sidebar .nav-item .nav-link:hover { background-color: #243b24; color: #ffffff; }
        .sidebar .nav-sidebar .nav-item .nav-link.active { background-color: #17754a; color: #ffffff; }
        .nav-sidebar .nav-header { color: #8aae96; font-size: 0.7rem; letter-spacing: 0.08em; }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                    <i class="fas fa-user-md me-1"></i>
                    <?= session()->get('nama_pegawai') ?>
                    <span class="badge bg-success ms-1" style="font-size: 0.65rem;">Dokter</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="<?= base_url('logout') ?>" class="dropdown-item">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #1d2d1d;">
        <a href="<?= base_url('dokter/dashboard') ?>" class="brand-link">
            <i class="fas fa-user-md ms-3 me-2"></i>
            <span class="brand-text font-weight-bold" style="font-size: 0.9rem;">Portal Dokter</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <li class="nav-header">MENU</li>
                    <li class="nav-item">
                        <a href="<?= base_url('dokter/dashboard') ?>" class="nav-link <?= (uri_string() == 'dokter/dashboard') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
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

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0" style="font-size: 1.3rem;"><?= $title ?? '' ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="fas fa-check-circle me-2"></i> <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <i class="fas fa-exclamation-circle me-2"></i> <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <strong>Terdapat kesalahan:</strong>
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

    <footer class="main-footer text-sm">
        <strong>&copy; <?= date('Y') ?> Sistem Informasi Neurologi RS Bhayangkara Padang.</strong>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
