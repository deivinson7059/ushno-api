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
#Creamos las rutas Publicas

$routes->get('/', 'Home::index');

//$routes->resource('api/horario', ['controller' => 'HorarioController']);

#Creamos las rutas Protegidas
$routes->group('admin', function ($routes) {

#Creamos las rutas horarios
    $routes->get('horario', 'HorarioController::index');
    $routes->get('horario/(:num)', 'HorarioController::getHorario/$1');

    $routes->get('horario/create', 'HorarioController::create');
    $routes->post('horario/save', 'HorarioController::save');
    $routes->get('horario/delete/(:num)', 'HorarioController::delete/$1');
    $routes->get('horario/edit/(:num)', 'HorarioController::edit/$1');
    $routes->post('horario/update', 'HorarioController::update');

    $routes->get('cbteams', 'HorarioController::getcbTeam');
    $routes->get('cbdias', 'HorarioController::getcbDia');

});

$routes->group('auth', function ($routes) {

    $routes->get('new', 'AuthController::create');
    $routes->post('login', 'AuthController::login');
    $routes->post('renew', 'AuthController::renew');

});

$routes->group('emisora', function ($routes) {
    $routes->get('horario/(:num)', 'HorarioController::getHorario/$1');
    $routes->get('teams', 'TeamsController::index');

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
