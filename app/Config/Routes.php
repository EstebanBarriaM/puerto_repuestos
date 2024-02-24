<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// Frontend routes
$routes->group('', ['namespace' => 'App\Controllers\Front'], function($routes)
{
    $routes->get('/', 'HomeController::index', ['as' => 'homePage']);
    $routes->get('producto/(:num)', 'HomeController::viewProduct/$1', ['as' => 'productPage']);
    $routes->get('categoria/(:num)', 'HomeController::viewCategory/$1', ['as' => 'categoryPage']);
    $routes->get('carro', 'HomeController::cart', ['as' => 'cart']);
    $routes->get('pago/exito', 'HomeController::paymentSuccess', ['as' => 'paymentSuccess']);
    $routes->get('pago/error', 'HomeController::paymentError', ['as' => 'paymentError']);
   /* $routes->group('mi-cuenta', ['filter' => 'auth'], function($routes)
    {
        $routes->get('/', 'HomeController::index', ['as' => 'homeCusomer']);
    });*/
});

// Backend routes
$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'auth'], function($routes)
{
    $routes->get('/', 'HomeController::index', ['as' => 'homeAdmin']);

    $routes->group('categorias', function($routes)
    {
        $routes->get('/', 'CategoriesController::index', ['as' => 'categoriesList']);
        $routes->get('nueva', 'CategoriesController::create', ['as' => 'categoriesCreate']);
        $routes->post('save', 'CategoriesController::save', ['as' => 'categoriesSave']);
        $routes->get('editar/(:num)', 'CategoriesController::edit/$1', ['as' => 'categoriesEdit']);
        $routes->post('update', 'CategoriesController::update', ['as' => 'categoriesUpdate']);
        $routes->get('eliminar/(:num)', 'CategoriesController::delete/$1', ['as' => 'categoriesDelete']);
    });

    $routes->group('usuarios', function($routes)
    {
        $routes->get('/', 'UsersController::index', ['as' => 'usersList']);
        $routes->get('nueva', 'UsersController::create', ['as' => 'usersCreate']);
        $routes->post('save', 'UsersController::save', ['as' => 'usersSave']);
        $routes->get('editar/(:num)', 'UsersController::edit/$1', ['as' => 'usersEdit']);
        $routes->post('update', 'UsersController::update', ['as' => 'usersUpdate']);
        $routes->get('eliminar/(:num)', 'UsersController::delete/$1', ['as' => 'usersDelete']);
    });

    $routes->group('clientes', function($routes)
    {
        $routes->get('/', 'CustomersController::index', ['as' => 'customersList']);
        $routes->get('nuevo', 'CustomersController::create', ['as' => 'customersCreate']);
        $routes->post('save', 'CustomersController::save', ['as' => 'customersSave']);
        $routes->get('editar/(:num)', 'CustomersController::edit/$1', ['as' => 'customersEdit']);
        $routes->post('update', 'CustomersController::update', ['as' => 'customersUpdate']);
        $routes->get('eliminar/(:num)', 'CustomersController::delete/$1', ['as' => 'customersDelete']);
    });

    $routes->group('productos', function($routes)
    {
        $routes->get('/', 'ProductsController::index', ['as' => 'productsList']);
        $routes->get('nuevo', 'ProductsController::create', ['as' => 'productsCreate']);
        $routes->post('save', 'ProductsController::save', ['as' => 'productsSave']);
        $routes->get('editar/(:num)', 'ProductsController::edit/$1', ['as' => 'productsEdit']);
        $routes->post('update', 'ProductsController::update', ['as' => 'productsUpdate']);
        $routes->get('eliminar/(:num)', 'ProductsController::delete/$1', ['as' => 'productsDelete']);
    });

    $routes->group('auto/marca', function($routes)
    {
        $routes->get('/', 'CarBrandsController::index', ['as' => 'carBrandsList']);
        $routes->get('nueva', 'CarBrandsController::create', ['as' => 'carBrandsCreate']);
        $routes->post('save', 'CarBrandsController::save', ['as' => 'carBrandsSave']);
        $routes->get('editar/(:num)', 'CarBrandsController::edit/$1', ['as' => 'carBrandsEdit']);
        $routes->post('update', 'CarBrandsController::update', ['as' => 'carBrandsUpdate']);
        $routes->get('eliminar/(:num)', 'CarBrandsController::delete/$1', ['as' => 'carBrandsDelete']);
    });

    $routes->group('auto/modelo', function($routes)
    {
        $routes->get('/', 'CarModelsController::index', ['as' => 'carModelsList']);
        $routes->get('nuevo', 'CarModelsController::create', ['as' => 'carModelsCreate']);
        $routes->post('save', 'CarModelsController::save', ['as' => 'carModelsSave']);
        $routes->get('editar/(:num)', 'CarModelsController::edit/$1', ['as' => 'carModelsEdit']);
        $routes->post('update', 'CarModelsController::update', ['as' => 'carModelsUpdate']);
        $routes->get('eliminar/(:num)', 'CarModelsController::delete/$1', ['as' => 'carModelsDelete']);
    });

    $routes->group('compras', function($routes)
    {
        $routes->get('/', 'OrdersController::index', ['as' => 'ordersList']);
    });

});

// Auth routes
$routes->group('auth', ['namespace' => 'App\Controllers\Auth'], function($routes)
{
    $routes->get('login', 'LoginController::index', ['as' => 'login']);
    $routes->post('signin', 'LoginController::login', ['as' => 'signin']);
    $routes->get('signout', 'LoginController::signout', ['as' => 'signout']);
    $routes->get('bye', 'LoginController::signout', ['as' => 'homePage']);
    $routes->get('registro', 'RegisterController::index', ['as' => 'register']);
    $routes->post('store', 'RegisterController::store');
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
