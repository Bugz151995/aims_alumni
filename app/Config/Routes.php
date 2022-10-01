<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Page::index');
$routes->get('registration', 'Page::showPage/registration');
$routes->post('register', 'Account::register');
$routes->post('login', 'Account::login');
$routes->get('logout', 'Account::logout');
$routes->get('register/success', 'Page::showPage/success');

$routes->get('home', 'Page::showPage/home');
$routes->get('announcements', 'Page::showPage/announcements');
$routes->get('forum', 'Page::showPage/forum');
$routes->get('profile', 'Page::showPage/profile');

$routes->post('post/create', 'Post::create');
$routes->post('forum/create', 'Forum::create');

// rest api 
$routes->group('api', static function ($routes) {
    $routes->get('brgy/(:any)/(:any)/(:any)', 'RestAPIBarangay::fetch/$1/$2/$3');
    $routes->get('citymun/(:any)/(:any)', 'RestAPICityMun::fetch/$1/$2');
    $routes->get('province/(:any)', 'RestAPIProvince::fetch/$1');
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
