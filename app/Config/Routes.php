<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');

$routes->group('user', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'Satker\DashboardController::index');
    $routes->get('panduan', 'Satker\PanduanController::index');
    $routes->get('Satker/PanduanController/displayPdf', 'Satker\PanduanController::displayPdf');
    $routes->get('daftar', 'Satker\DaftarController::daftar_orderan');
    $routes->get('order', 'Satker\BuatController::index');
    $routes->post('buat/create', 'Satker\BuatController::create');
    $routes->get('profile', 'Satker\ProfileController::profile'); // Menampilkan profil pengguna
    $routes->post('profile/update', 'Satker\ProfileController::updateProfile'); 
    $routes->get('daftar/edit/(:any)', 'Satker\DaftarController::edit/$1');  // Edit order berdasarkan no_order
    $routes->post('daftar/update/(:any)', 'Satker\DaftarController::update/$1');  // Update pengajuan
    $routes->get('daftar/delete/(:any)', 'Satker\DaftarController::delete/$1');   // Hapus pengajuan
});

// Authentication routes
$routes->get('/login', 'AuthController::login');
$routes->post('/auth/attemptLogin', 'AuthController::attemptLogin');
$routes->get('/logout', 'AuthController::logout');

// Registration routes
$routes->get('/register', 'RegisterController::register');
$routes->post('/register/attemptRegister', 'RegisterController::attemptRegister');

// Admin routes
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('home', 'Admin\HomeController::index'); // Halaman home admin
    $routes->get('orders', 'Admin\OrderController::index'); // Daftar pengajuan

    // Rute untuk menyetujui dan menolak pengajuan
    $routes->get('order/approve/(:num)', 'Admin\OrderController::approve/$1'); // Menyetujui pengajuan
    $routes->get('order/reject/(:num)', 'Admin\OrderController::reject/$1');   // Menolak pengajuan

    // Tambahkan rute untuk daftar pengajuan masuk dan ditolak
    $routes->get('orders/incoming', 'Admin\OrderController::incoming'); // Daftar pengajuan masuk
    $routes->get('order/download/(:num)', 'Admin\OrderController::download/$1');
    $routes->get('orders/rejected', 'Admin\OrderController::rejected');
    $routes->get('order/detail/(:num)', 'Admin\OrderController::detail/$1'); 

    $routes->get('profile', 'Admin\ProfileController::profile');
    // $routes->post('profile/edit', 'Admin\ProfileController::updateProfile');

    $routes->post('profile/update', 'Admin\ProfileController::updateProfile');
    $routes->get('orders/process', 'Admin\OrderController::process'); // Daftar pengajuan dalam proses atau selesai
});


// SuperAdmin routes
$routes->group('superadmin', ['filter' => 'auth'], function ($routes) {
    // Dashboard Home
    $routes->get('home', 'SuperAdmin\HomeController::index', ['as' => 'superadmin.home']);

    // Order Management
    $routes->get('orders', 'SuperAdmin\OrderController::index', ['as' => 'superadmin.orders']);
    $routes->get('order/updateStatus/(:num)/(:alpha)', 'SuperAdmin\OrderController::updateStatus/$1/$2', ['as' => 'superadmin.order.updateStatus']);
    $routes->get('orders/incoming', 'SuperAdmin\OrderController::incoming', ['as' => 'superadmin.orders.incoming']);
    $routes->get('orders/completed', 'SuperAdmin\OrderController::completed', ['as' => 'superadmin.orders.completed']);
    $routes->get('order/download/(:num)', 'SuperAdmin\OrderController::download/$1', ['as' => 'superadmin.order.download']);

    // Profile Management
    $routes->get('profile', 'SuperAdmin\ProfileController::profile', ['as' => 'superadmin.profile']);
    $routes->post('profile/update', 'SuperAdmin\ProfileController::updateProfile', ['as' => 'superadmin.profile.update']);

    // User Management Routes
    $routes->get('user-management', 'SuperAdmin\UserController::index', ['as' => 'superadmin.user.index']); // Halaman utama manajemen user
    $routes->get('user/create', 'SuperAdmin\UserController::create');  // Halaman form tambah user
    $routes->post('user/store', 'SuperAdmin\UserController::store'); // Simpan user baru
    $routes->get('user/edit/(:num)', 'SuperAdmin\UserController::edit/$1', ['as' => 'superadmin.user.edit']); // Halaman edit user
    $routes->post('user/update/(:num)', 'SuperAdmin\UserController::update/$1', ['as' => 'superadmin.user.update']); // Update user
    $routes->get('user/logs', 'SuperAdmin\UserController::logs', ['as' => 'superadmin.user.logs']);

    $routes->get('pengajuan', 'SuperAdmin\PengajuanController::index');
    $routes->get('pengajuan/create', 'SuperAdmin\PengajuanController::create');
    $routes->post('pengajuan/store', 'SuperAdmin\PengajuanController::store');
});

$routes->group('kasusbag', ['filter' => 'auth'], function($routes) {
    // Halaman utama Kasusbag
    $routes->get('home', 'Kasusbag\HomeController::index');  // Kasusbag dashboard

    // Rute untuk menyetujui dan menolak pengajuan
    $routes->get('approve/(:num)', 'Kasusbag\HomeController::approve/$1'); // Menyetujui pengajuan
    $routes->get('reject/(:num)', 'Kasusbag\HomeController::reject/$1'); // Menolak pengajuan
});


