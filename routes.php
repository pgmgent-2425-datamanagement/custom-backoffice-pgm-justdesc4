<?php

//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });
$router->setNamespace('\App\Controllers');
$router->get('/', 'HomeController@index');
$router->get('/admin', 'AdminController@index');
$router->get('/admin/products/new', 'AdminController@addProduct');