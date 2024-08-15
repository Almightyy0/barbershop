<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('admin', ['filter' => 'adminfilter'], function ($routes) {
    $routes->get('/', 'AdminDashboard::index');
    $routes->get('jadwal', 'AdminJadwal::index');
    $routes->post('jadwal-server', 'AdminJadwal::ajaxList');
    $routes->post('tambah-jadwal', 'AdminJadwal::tambahJadwal');
    $routes->post('edit-jadwal', 'AdminJadwal::editJadwal');
    $routes->post('delete-jadwal', 'AdminJadwal::deleteJadwal');
    $routes->get('barber', 'AdminBarber::index');
    $routes->post('barber-server', 'AdminBarber::ajaxList');
    $routes->post('tambah-barber', 'AdminBarber::tambahBarber');
    $routes->get('layanan', 'AdminLayanan::index');
    $routes->post('layanan-server', 'AdminLayanan::ajaxList');
    $routes->post('tambah-layanan', 'AdminLayanan::tambahLayanan');
    $routes->post('edit-layanan', 'AdminLayanan::editLayanan');
    $routes->post('delete-layanan', 'AdminLayanan::deleteLayanan');
    $routes->get('pelanggan', 'AdminPelanggan::index');
    $routes->get('transaksi', 'AdminTransaksi::index');
    $routes->post('transaksi-server', 'AdminTransaksi::ajaxList');
    $routes->get('profil', 'AdminProfil::index');

});
$routes->group('pegawai', ['filter' => 'pegawaifilter'], function ($routes) {
    $routes->get('/', 'PegawaiDashboard::index');
    $routes->get('keluar', 'PegawaiDashboard::keluar');
    $routes->get('masuk', 'PegawaiDashboard::masuk');
    $routes->get('terima/(:any)', 'PegawaiDashboard::terima/$1');
    $routes->get('tolak/(:any)', 'PegawaiDashboard::tolak/$1');
    $routes->get('selesai/(:any)', 'PegawaiDashboard::selesai/$1');
    $routes->get('jadwal', 'Jadwal::index');
    $routes->get('histori', 'PegawaiHistori::index');
    $routes->get('profil', 'PegawaiProfil::index');
    $routes->post('histori-server', 'PegawaiHistori::ajaxList');

});
$routes->get('/', 'PelangganDashboard::index');
$routes->get('/layanan', 'PelangganService::index', ['filter' => 'pelangganfilter']);
$routes->get('/pesanan/(:segment)', 'Pesanan::index/$1', ['filter' => 'pelangganfilter']);
$routes->post('/pesanan', 'Pesanan::pesananHandler', ['filter' => 'pelangganfilter']);
$routes->get('/pesanan', 'PesananStatus::index', ['filter' => 'pelangganfilter']);
$routes->post('/batalkan-pesanan', 'PesananStatus::batalkanPesanan', ['filter' => 'pelangganfilter']);
$routes->get('/profil', 'PelangganProfil::index', ['filter' => 'pelangganfilter']);
$routes->get('/success-trx', 'Pesanan::success', ['filter' => 'pelangganfilter']);
$routes->get('/histori', 'PelangganHistori::index', ['filter' => 'pelangganfilter']);

$routes->get('/login', 'Auth::index', ['filter' => 'loginfilter']);
$routes->post('/login', 'Auth::authLogin', ['filter' => 'loginfilter']);
$routes->get('/register', 'Auth::register', ['filter' => 'loginfilter']);
$routes->post('/register', 'Auth::registerUser', ['filter' => 'loginfilter']);
$routes->get('/otp', 'Auth::otp', ['filter' => 'authfilter']);
$routes->post('/otp', 'Auth::otp', ['filter' => 'authfilter']);
$routes->get('/success', 'Auth::success', ['filter' => 'authfilter']);
$routes->get('/forget-password', 'Auth::forgetPassword');
$routes->post('/forget-password', 'Auth::verifyForgetPassword', ['filter' => 'authfilter']);
$routes->get('/logout', 'Auth::logout');
$routes->get('/new-password', 'Auth::newPassword', ['filter' => 'authfilter']);
$routes->post('/new-password', 'Auth::savePassword', ['filter' => 'authfilter']);
$routes->get('/whatsapp-auth', 'Auth::whatsappAuth');
$routes->get('/resend-otp', 'Auth::resendOtp', ['filter' => 'authfilter']);
$routes->get('/send-wa', 'Auth::sendWhatsapp', ['filter' => 'authfilter']);
$routes->post('/whatsapp-auth', 'Auth::verifyWhatsappAuth', ['filter' => 'authfilter']);
