<?php

namespace Config;

use App\Controllers\PlayerController;
use App\Controllers\TeamController;
use App\Controllers\TransferController;
use App\Controllers\LeagueController;
use App\Controllers\AgentController;
use App\Controllers\ContractController;
use App\Controllers\CountryController;

// Create a new instance of our RouteCollection class.
// $routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
// if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
//     require SYSTEMPATH . 'Config/Routes.php';
// }

// $routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/login', 'AuthController::login');
$routes->post('auth/loginProcess', 'AuthController::loginProcess');
$routes->get('register', 'AuthController::register');
$routes->post('auth/registerProcess', 'AuthController::registerProcess');
$routes->get('logout', 'AuthController::logout');

// Rute yang memerlukan login
$routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);





// $routes->setDefaultNamespace('App\Controllers');
// $routes->setDefaultController('Home');
// $routes->setDefaultMethod('index');
// $routes->setTranslateURIDashes(false);
// $routes->set404Override();
// $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Player Routes
$routes->get('/players', 'PlayerController::index');
$routes->get('/players/create', 'PlayerController::create');
$routes->post('/players/store', 'PlayerController::store');
$routes->get('/players/edit/(:num)', 'PlayerController::edit/$1');
$routes->post('/players/update/(:num)', 'PlayerController::update/$1');
$routes->post('/players/delete/(:num)', 'PlayerController::delete/$1');

// Team Routes
$routes->get('/teams', 'TeamController::index');
$routes->get('/teams/create', 'TeamController::create');
$routes->post('/teams/store', 'TeamController::store');
$routes->get('/teams/edit/(:num)', 'TeamController::edit/$1');
$routes->post('/teams/update/(:num)', 'TeamController::update/$1');
$routes->post('/teams/delete/(:num)', 'TeamController::delete/$1');

// Transfer Routes
$routes->get('/transfers', 'TransfersController::index');
$routes->get('/transfers/create', 'TransfersController::create');
$routes->post('/transfers/store', 'TransfersController::store');
$routes->get('/transfers/edit/(:num)', 'TransfersController::edit/$1');
$routes->post('/transfers/update/(:num)', 'TransfersController::update/$1');
$routes->post('/transfers/delete/(:num)', 'TransfersController::delete/$1');

// League Routes
$routes->get('/leagues', 'LeaguesController::index');
$routes->get('/leagues/create', 'LeaguesController::create');
$routes->post('/leagues/store', 'LeaguesController::store');
$routes->get('/leagues/edit/(:num)', 'LeaguesController::edit/$1');
$routes->post('/leagues/update/(:num)', 'LeaguesController::update/$1');
$routes->post('/leagues/delete/(:num)', 'LeaguesController::delete/$1');


// Agent Routes
$routes->get('/agents', 'AgentController::index');
$routes->get('/agents/create', 'AgentController::create');
$routes->post('/agents/store', 'AgentController::store');
$routes->get('/agents/edit/(:num)', 'AgentController::edit/$1');
$routes->post('/agents/update/(:num)', 'AgentController::update/$1');
$routes->post('/agents/delete/(:num)', 'AgentController::delete/$1');

// Contract Routes
$routes->get('/contracts', 'ContractController::index');
$routes->get('/contracts/create', 'ContractController::create');
$routes->post('/contracts/store', 'ContractController::store');
$routes->get('/contracts/edit/(:num)', 'ContractController::edit/$1');
$routes->post('/contracts/update/(:num)', 'ContractController::update/$1');
$routes->post('/contracts/delete/(:num)', 'ContractController::delete/$1');


// Country Routes
$routes->get('/countries', 'CountryController::index');
$routes->get('/countries/create', 'CountryController::create');
$routes->post('/countries/store', 'CountryController::store');
$routes->get('/countries/edit/(:num)', 'CountryController::edit/$1');
$routes->post('/countries/update/(:num)', 'CountryController::update/$1');
$routes->post('/countries/delete/(:num)', 'CountryController::delete/$1');

// Users Routes
$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/processLogin', 'Auth::processLogin');
$routes->get('/auth/logout', 'Auth::logout');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to get them to be able to override any defaults in this file.
 * You can do that below.
 */

// if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
//     require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
// }