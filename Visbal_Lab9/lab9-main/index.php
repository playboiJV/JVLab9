<?php

require "vendor/autoload.php";
require "init.php";

// Database connection object (from init.php (DatabaseConnection))
global $conn;

try {

    // Create Router instance
    $router = new \Bramus\Router\Router();

    // Define routes
    // Define route for customers
    // Route to display the edit form
    $router->get('/customers/{id}/edit', '\App\Controllers\CustomerController@edit');

// Route to handle the form submission and update the customer
    $router->post('/customers/{id}', '\App\Controllers\CustomerController@update');

    $router->get('/customers/{id}', '\App\Controllers\CustomerController@show');
    $router->get('/customers', '\App\Controllers\CustomerController@list');
    $router->get('/', '\App\Controllers\HomeController@index');
    $router->get('/suppliers', '\App\Controllers\SupplierController@list');
    $router->get('/suppliers/{id}', '\App\Controllers\SupplierController@single');
    $router->post('/suppliers/{id}', '\App\Controllers\SupplierController@update');

    // Run it!
    $router->run();

} catch (Exception $e) {

    echo json_encode([
        'error' => $e->getMessage()
    ]);

}
