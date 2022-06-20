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
 $routes->get('/', 'Home::index');

$routes->group('', ['filter'=>'AuthCheck'], function($routes) {
    $routes->get('/', 'DashboardController::index', ['as'=> 'dashboard.home']);
    $routes->get('dashboard/', 'DashboardController::index', ['as'=> 'dashboard.home']);
    $routes->get('dashboard/profile', 'DashboardController::profile', ['as'=> 'dashboard.profile']);
    $routes->get('dashboard/pacients', 'PacientController::pacients', ['as'=> 'dashboard.pacients']);
    $routes->get('dashboard/create_pacient', 'PacientController::create_pacient', ['as'=> 'dashboard.create_pacient']);
    $routes->get('auth/save', 'Auth::save');

    $routes->get('PacientController/save', 'PacientController::save');
    $routes->get('dashboard/edit_pacient/(:num)', 'PacientController::edit_pacient/$1');
    $routes->get('PacientController/update/(:num)', 'PacientController::update/$1');
    $routes->get('dashboard/search_pacient', 'PacientController::search_pacient/');
    $routes->get('dashboard/pacients_menu', 'PacientController::pacients_menu');
    $routes->get('dashboard/view_all_pacients', 'PacientController::view_all_pacients');
    $routes->get('dashboard/view_pacient/(:num)', 'PacientController::view_pacient/$1');

});

$routes->group('', ['filter' => 'UserRoleFilter'], function($routes) {
    $routes->get('dashboard/users', 'DashboardController::users', ['as'=> 'dashboard.users']);
    $routes->get('Auth/update_user/(:num)', 'Auth::update_user/$1');
    $routes->get('Auth/edit_user/(:num)', 'Auth::edit_user/$1');
    $routes->get('dashboard/delete_user/(:num)', 'Auth::delete_user/$1');
    $routes->get('auth/register', 'Auth::register');
    $routes->get('dashboard/settings', 'SettingsController::index');
    $routes->get('dashboard/delete/(:num)', 'PacientController::delete/$1');
});


$routes->group('', ['filter' => 'AlreadyLoggedInFilter'], function($routes) {
    $routes->get('/auth/login', 'Auth::index');
    $routes->get('/auth', 'Auth::index');
    $routes->get('/auth/confirm', 'Auth::confirm');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
