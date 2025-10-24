<?php
//
//use CodeIgniter\Router\RouteCollection;
//
///**
// * @var RouteCollection $routes
// */
//$routes->get('/', 'Home::index');
//$routes->get('/home', 'Home::index');
//$routes->get('/katalog', 'Home::katalog');
//$routes->get('/produk/(:num)', 'Home::detailProduk/$1');
//
//
//// Sewa Routes
//$routes->get('/sewa/(:num)', 'Sewa::index/$1');
//$routes->post('/sewa/process', 'Sewa::process');
//$routes->get('/sewa/konfirmasi/(:num)', 'Sewa::konfirmasi/$1');
//$routes->get('/user/transaksi', 'Sewa::riwayat');
//
//// Riwayat Routes
//$routes->get('/riwayat', 'Riwayat::index');
//$routes->get('/riwayat/detail/(:num)', 'Riwayat::detail/$1');
//$routes->post('/riwayat/batalkan/(:num)', 'Riwayat::batalkan/$1');
//
//$routes->get('/auth/login', 'Auth::login');
//$routes->get('/auth/register', 'Auth::register');
//$routes->get('/auth/logout', 'Auth::logout');
//
//// User Routes (alias untuk riwayat)
//$routes->get('/user/transaksi', 'Riwayat::index');
//
//// Auth Routes (placeholder)
//$routes->get('/auth/login', 'Home::index'); // Temporary redirect to home
//$routes->get('/auth/register', 'Home::index'); // Temporary redirect to home
//$routes->get('/auth/logout', 'Home::index'); // Temporary redirect to home
//
//// User Routes (placeholder)
//$routes->get('/user/transaksi', 'Home::index');
//$routes->get('/user/profile', 'Home::index');
//
//// Admin Routes (placeholder)
//$routes->get('/admin/produk', 'Home::index');
//$routes->get('/admin/transaksi', 'Home::index');
//
//// Sewa Route
//$routes->get('/sewa/(:num)', 'Home::index');


use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/katalog', 'Home::katalog');
$routes->get('/produk/(:num)', 'Home::detailProduk/$1');

// Sewa Routes
$routes->get('/sewa/(:num)', 'Sewa::index/$1');
$routes->post('/sewa/process', 'Sewa::process');
$routes->get('/sewa/konfirmasi/(:num)', 'Sewa::konfirmasi/$1');

$routes->get('/produk/(:num)', 'KatalogController::detail/$1');


// Riwayat Routes
$routes->get('/riwayat', 'Riwayat::index');
$routes->get('/riwayat/detail/(:num)', 'Riwayat::detail/$1');
$routes->post('/riwayat/batalkan/(:num)', 'Riwayat::batalkan/$1');

//// Auth Routes
//$routes->get('/auth/login', 'Auth::login');
//$routes->post('/auth/attemptLogin', 'Auth::attemptLogin');
//$routes->get('/auth/register', 'Auth::register');
//$routes->post('/auth/attemptRegister', 'Auth::attemptRegister');
//$routes->get('/auth/logout', 'Auth::logout');
//$routes->get('/auth/profile', 'Auth::profile');

// Auth Routes - GUNAKAN AuthSimple
$routes->get('/auth/login', 'AuthSimple::login');
$routes->post('/auth/attemptLogin', 'AuthSimple::attemptLogin');
$routes->get('/auth/register', 'AuthSimple::register');
$routes->post('/auth/attemptRegister', 'AuthSimple::attemptRegister');
$routes->get('/auth/logout', 'AuthSimple::logout');

// User Routes
$routes->get('/user/transaksi', 'Riwayat::index');

//admin
$routes->get('/admin', 'Admin\Dashboard::index');
$routes->get('/admin/dashboard', 'Admin\Dashboard::index');

//// Transaksi Routes
//$routes->get('/admin/transaksi', 'Admin\Transaksi::index');
//$routes->get('/admin/transaksi/detail/(:num)', 'Admin\Transaksi::detail/$1');
//$routes->post('/admin/transaksi/konfirmasi/(:num)', 'Admin\Transaksi::konfirmasiPembayaran/$1');
//$routes->post('/admin/transaksi/update-status/(:num)', 'Admin\Transaksi::updateStatus/$1');

// Produk Routes (placeholder)
$routes->get('/admin/produk', 'Admin\Dashboard::index');
$routes->get('/admin/users', 'Admin\Dashboard::index');


// Admin Transaksi Routes
$routes->get('/admin/transaksi', 'Admin\Transaksi::index');
$routes->get('/admin/transaksi/detail/(:num)', 'Admin\Transaksi::detail/$1');
$routes->post('/admin/transaksi/konfirmasi/(:num)', 'Admin\Transaksi::konfirmasiPembayaran/$1');
$routes->post('/admin/transaksi/update-status/(:num)', 'Admin\Transaksi::updateStatus/$1');
$routes->post('/admin/transaksi/batalkan/(:num)', 'Admin\Transaksi::batalkan/$1');


$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('transaksi', 'Admin\Transaksi::index');
    $routes->get('transaksi/detail/(:num)', 'Admin\Transaksi::detail/$1');
    $routes->post('transaksi/konfirmasi/(:num)', 'Admin\Transaksi::konfirmasiPembayaran/$1');
    $routes->post('transaksi/update-status/(:num)', 'Admin\Transaksi::updateStatus/$1');
    $routes->post('transaksi/batalkan/(:num)', 'Admin\Transaksi::batalkan/$1');
});


