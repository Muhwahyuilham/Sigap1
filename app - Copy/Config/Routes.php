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
    $routes->get('orders/rejected', 'Admin\OrderController::rejected'); // Daftar pengajuan ditolak

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
});

