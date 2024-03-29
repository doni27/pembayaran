<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('login','Auth::login');
$routes->addRedirect('/','home');
// $routes->get('/', 'Home::index');
$routes->get('Pembayaran', 'Pembayaran:index');
$routes->get('Pembayaran/tambah', 'Pembayaran:tambah');
$routes->get('Pembayaran/ubah/(:any)', 'Pembayaran:ubah/$id');
$routes->put('Pembayaran/proses_ubah/(:any)', 'Pembayaran:ubah/$id');
$routes->put('Pembayaran/delete/(:any)', 'Pembayaran:delete/$id');

$routes->get('Tagihan', 'Tagihan:index');
$routes->get('Tagihan/tambah', 'Tagihan:tambah');
$routes->get('Tagihan/ubah/(:any)', 'Tagihan:ubah/$id');
$routes->put('Tagihan/proses_ubah/(:any)', 'Tagihan:ubah/$id');
$routes->put('Tagihan/delete/(:any)', 'Tagihan:delete/$id');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
