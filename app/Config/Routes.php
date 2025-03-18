<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->group('admin', function ($routes) {
    $routes->get('/', 'Auth::index');
    $routes->post('login', 'Auth::login');
    $routes->get('logout', 'Auth::logout');
    $routes->get('dashboard', 'Auth::dashboard', ['filter' => 'auth']);
    $routes->group('setting', function ($routes) {
        $routes->get('/', 'Setting::index', ['filter' => 'auth']);
        $routes->post('update', 'Setting::update', ['filter' => 'auth']);
    });

    $routes->get('profil', 'User::profil', ['filter' => 'auth']);
    $routes->post('profil/update', 'User::profilUpdate', ['filter' => 'auth']);
    $routes->group('users', function ($routes) {
        $routes->get('index', 'User::index', ['filter' => ['auth', \App\Filters\Admin::class]]);
        $routes->get('create', 'User::create', ['filter' => 'auth']);
        $routes->post('list', 'User::list', ['filter' => 'auth']);
        $routes->post('save', 'User::save', ['filter' => 'auth']);
        $routes->post('detail', 'User::detail', ['filter' => 'auth']);
        $routes->post('delete', 'User::delete', ['filter' => 'auth']);
    });

    $routes->group('aset', function ($routes) {
        $routes->get('index', 'Aset::index', ['filter' => 'auth']);
        $routes->post('list', 'Aset::list', ['filter' => 'auth']);
        $routes->match(['get', 'post'], 'create', 'Aset::create', ['filter' => 'auth']);
        $routes->post('detail', 'Aset::detail', ['filter' => 'auth']);
        $routes->post('delete', 'Aset::delete', ['filter' => 'auth']);
        $routes->post('upload', 'Aset::upload', ['filter' => 'auth']);
    });

    $routes->group('jenis', function ($routes) {
        $routes->get('index', 'Jenis::index', ['filter' => 'auth']);
        $routes->post('list', 'Jenis::list', ['filter' => 'auth']);
        $routes->match(['get', 'post'], 'create', 'Jenis::create', ['filter' => 'auth']);
        $routes->post('detail', 'Jenis::detail', ['filter' => 'auth']);
        $routes->post('update', 'Jenis::update', ['filter' => 'auth']);
        $routes->post('delete', 'Jenis::delete', ['filter' => 'auth']);
    });
});

$routes->get('/', 'Front::index');
$routes->get('kontak', 'Front::kontak');
$routes->group('lelang', function ($routes) {
    $routes->get('detail/(:any)', 'Front::detail/$1');
});
