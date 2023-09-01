<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::index');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->group('instansi', ['filter' => 'auth'], function($routes){
    $routes->get('/', 'Instansi::index');
    $routes->get('tambah', 'Instansi::tambah');
    $routes->post('tambah', 'Instansi::simpan');
    $routes->get('(:num)/ubah', 'Instansi::ubah/$1');
    $routes->post('(:num)/ubah', 'Instansi::perbarui/$1');
    $routes->get('(:num)/hapus', 'Instansi::hapus/$1');
});
