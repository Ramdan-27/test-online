<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

$routes->get('/materi', 'Materi::index');
$routes->get('/materi/create', 'Materi::create');
$routes->post('/materi/store', 'Materi::store');
$routes->get('/materi/edit/(:num)', 'Materi::edit/$1');
$routes->post('/materi/update/(:num)', 'Materi::update/$1');
$routes->get('/materi/delete/(:num)', 'Materi::delete/$1');

//route bank soal
$routes->get('/soal', 'Soal::index');
$routes->get('/soal/create', 'Soal::create');
$routes->post('/soal/store', 'Soal::store');
$routes->get('/soal/delete/(:num)', 'Soal::delete/$1');

//route untuk auth
$routes->get('/login', 'Auth::login');
$routes->post('/auth/loginProcess', 'Auth::loginProcess');
$routes->get('/register', 'Auth::register');
$routes->post('/auth/registerProcess', 'Auth::registerProcess');
$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard-peserta', 'Dashboard::peserta');
$routes->get('/jadwal', 'Jadwal::index');
$routes->get('/jadwal/create', 'Jadwal::create');
$routes->post('/jadwal/store', 'Jadwal::store');
$routes->get('/jadwal/delete/(:num)', 'Jadwal::delete/$1');
$routes->get('/ujian', 'Ujian::index');
$routes->get('/ujian/kerjakan/(:num)', 'Ujian::kerjakan/$1');
$routes->post('/ujian/submit', 'Ujian::submit');
$routes->get('/lupa-sandi', 'Auth::lupaSandi');
$routes->post('/lupa-sandi/proses', 'Auth::prosesLupaSandi');