<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Halaman utama → redirect ke login
$routes->get('/', 'Auth::index');

// -----------------------------------------------
// AUTH
// -----------------------------------------------
$routes->get('login', 'Auth::index');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

// -----------------------------------------------
// ADMIN - Dilindungi filter auth dan role:admin
// -----------------------------------------------
$routes->group('admin', ['filter' => ['auth', 'role:admin']], function ($routes) {
    // Dashboard
    $routes->get('dashboard', 'Admin\Dashboard::index');

    // Pegawai
    $routes->get('pegawai', 'Admin\Pegawai::index');
    $routes->get('pegawai/tambah', 'Admin\Pegawai::create');
    $routes->post('pegawai/simpan', 'Admin\Pegawai::store');
    $routes->get('pegawai/edit/(:num)', 'Admin\Pegawai::edit/$1');
    $routes->post('pegawai/update/(:num)', 'Admin\Pegawai::update/$1');
    $routes->get('pegawai/hapus/(:num)', 'Admin\Pegawai::delete/$1');

    // Pasien
    $routes->get('pasien', 'Admin\Pasien::index');
    $routes->get('pasien/tambah', 'Admin\Pasien::create');
    $routes->post('pasien/simpan', 'Admin\Pasien::store');
    $routes->get('pasien/edit/(:num)', 'Admin\Pasien::edit/$1');
    $routes->post('pasien/update/(:num)', 'Admin\Pasien::update/$1');
    $routes->get('pasien/hapus/(:num)', 'Admin\Pasien::delete/$1');

    // Penyakit
    $routes->get('penyakit', 'Admin\Penyakit::index');
    $routes->get('penyakit/tambah', 'Admin\Penyakit::create');
    $routes->post('penyakit/simpan', 'Admin\Penyakit::store');
    $routes->get('penyakit/edit/(:num)', 'Admin\Penyakit::edit/$1');
    $routes->post('penyakit/update/(:num)', 'Admin\Penyakit::update/$1');
    $routes->get('penyakit/hapus/(:num)', 'Admin\Penyakit::delete/$1');

    // Pemeriksaan
    $routes->get('pemeriksaan', 'Admin\Pemeriksaan::index');
    $routes->get('pemeriksaan/detail/(:num)', 'Admin\Pemeriksaan::detail/$1');

    // Laporan
    $routes->get('laporan', 'Admin\Laporan::index');
    $routes->get('laporan/cetak', 'Admin\Laporan::cetak');
});

// -----------------------------------------------
// DOKTER - Dilindungi filter auth dan role:dokter
// -----------------------------------------------
$routes->group('dokter', ['filter' => ['auth', 'role:dokter']], function ($routes) {
    // Dashboard
    $routes->get('dashboard', 'Dokter\Dashboard::index');

    // Pemeriksaan
    $routes->get('pemeriksaan', 'Dokter\Pemeriksaan::index');
    $routes->get('pemeriksaan/periksa/(:num)', 'Dokter\Pemeriksaan::periksa/$1');
    $routes->post('pemeriksaan/simpan/(:num)', 'Dokter\Pemeriksaan::simpan/$1');
    $routes->get('pemeriksaan/detail/(:num)', 'Dokter\Pemeriksaan::detail/$1');

    // Riwayat
    $routes->get('riwayat', 'Dokter\Pemeriksaan::riwayat');
});

// -----------------------------------------------
// PERAWAT - Dilindungi filter auth dan role:perawat
// -----------------------------------------------
$routes->group('perawat', ['filter' => ['auth', 'role:perawat']], function ($routes) {
    // Dashboard
    $routes->get('dashboard', 'Perawat\Dashboard::index');

    // Pasien
    $routes->get('pasien', 'Perawat\Pasien::index');
    $routes->get('pasien/tambah', 'Perawat\Pasien::create');
    $routes->post('pasien/simpan', 'Perawat\Pasien::store');
    $routes->get('pasien/edit/(:num)', 'Perawat\Pasien::edit/$1');
    $routes->post('pasien/update/(:num)', 'Perawat\Pasien::update/$1');

    // Pemeriksaan
    $routes->get('pemeriksaan', 'Perawat\Pemeriksaan::index');
    $routes->get('pemeriksaan/registrasi', 'Perawat\Pemeriksaan::registrasi');
    $routes->post('pemeriksaan/simpan', 'Perawat\Pemeriksaan::simpan');
    $routes->get('pemeriksaan/detail/(:num)', 'Perawat\Pemeriksaan::detail/$1');
    $routes->get('pemeriksaan/ajukan-resep/(:num)', 'Perawat\Pemeriksaan::ajukanResep/$1');
});
