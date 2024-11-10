<?php

//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });
$router->setNamespace('\App\Controllers');

// Page routes
$router->get('/', 'HomeController@index');
$router->get('/admin', 'AdminController@index');

/**
 * Admin routes
 */
// Orders
$router->get('/admin/orders', 'AdminController@orders');

// Products
$router->get('/admin/products', 'AdminController@products');
$router->get('/admin/products/new', 'AdminController@addProduct');
$router->get('/admin/products/edit/{id}', 'AdminController@editProduct');
$router->post('/admin/products/savemusic', 'AdminController@saveMusic');
$router->post('/admin/products/update/{id}', 'AdminController@editProduct');
$router->post('/admin/products/delete/{id}', 'AdminController@deleteProduct');

// Artists
$router->get('/admin/artists', 'AdminController@artists');
$router->get('/admin/artists/edit/{id}', 'AdminController@editArtist');
$router->get('/admin/artists/delete/{id}', 'AdminController@deleteArtist');
$router->post('/admin/artists/update', 'AdminController@editArtist');

// Filemanager
$router->get('/admin/filemanager', 'FilemanagerController@list');
$router->get('/admin/filemanager/images', 'FilemanagerController@images');
$router->get('/admin/filemanager/delete/{image}', 'FilemanagerController@deleteImage');

// API routes
$router->get('/api/products', 'ApiController@getProducts');
$router->get('/api/products/{id}', 'ApiController@getProduct');
$router->get('/api/tracks', 'ApiController@getTracks');
$router->get('/api/albums', 'ApiController@getAlbums');
$router->get('/api/artists', 'ApiController@getArtists');
$router->post('/api/add-artist', 'ApiController@addArtist');
