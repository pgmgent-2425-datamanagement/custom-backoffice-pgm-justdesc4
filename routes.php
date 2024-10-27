<?php

//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });
$router->setNamespace('\App\Controllers');
$router->get('/', 'HomeController@index');
$router->get('/admin', 'AdminController@index');
$router->get('/admin/products/new', 'AdminController@addProduct');
$router->post('/admin/products/savemusic', 'AdminController@saveMusic');
$router->get('/admin/products/edit/{id}', 'AdminController@editProduct');
$router->post('/admin/products/update/{id}', 'AdminController@editProduct');
$router->post('/admin/products/delete/{id}', 'AdminController@deleteProduct');
