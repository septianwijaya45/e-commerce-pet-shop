<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'DashboardController::index', ['filter' => 'role:admin', 'as' => 'dashboard']);

$routes->group('produk', static function($routes){
    $routes->get('', 'ProdukController::index', ['filter' => 'role:admin', 'as' => 'produk']);

    $routes->get('(:num)', 'ProdukController::edit/$1', ['filter' => 'role:admin', 'as' => 'edit.produk']);
    $routes->post('(:num)', 'ProdukController::update/$1', ['filter' => 'role:admin', 'as' => 'update.produk']);

    $routes->delete('delete/(:num)', 'ProdukController::delete/$1', ['filter' => 'role:admin', 'as' => 'delete.produk']);

    $routes->get('tambah-produk', 'ProdukController::insert', ['filter' => 'role:admin', 'as' => 'add.produk']);
    $routes->post('simpan-produk', 'ProdukController::store', ['filter' => 'role:admin', 'as' => 'store.produk']);
});

$routes->group('profile', static function($routes){
    $routes->get('(:num)', 'ProfileController::index/$1', ['filter' => 'role:admin', 'as' => 'profile']);
    $routes->post('(:num)', 'ProfileController::update/$1', ['filter' => 'role:admin', 'as' => 'update.profile']);
});
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
