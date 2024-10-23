<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('mobil', 'Mobil::index'); // Route untuk menampilkan halaman index
$routes->get('/mobil/json', 'Mobil::showSimpleJson'); // Route untuk menampilkan JSON sederhana dari mobil
$routes->get('mobil/data', 'Mobil::getMobil'); // Route untuk mendapatkan mobil dalam format JSON
$routes->post('mobil/store', 'Mobil::create'); // Route untuk menyimpan data mobil
$routes->get('mobil/show', 'Mobil::show'); // Route untuk menampilkan data berdasarkan id
$routes->get('/mobil/data-mobil', 'Mobil::getMobilDataJson'); // Route untuk mendapatkan data mobil dalam format JSON
$routes->post('mobil/update/(:num)', 'Mobil::update/$1'); // Route untuk mengupdate data berdasarkan id
$routes->delete('mobil/delete/(:num)', 'Mobil::delete/$1'); // Route untuk menghapus data berdasarkan id
$routes->get('/mobil/data-mobil', 'Mobil::getMobilDataJson'); // Route untuk mengit add gitdapatkan data mobil dalam format JSON

/* $routes->get('mobil/delete/(:num)', 'Mobil::delete/$1'); */