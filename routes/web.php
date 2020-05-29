<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/hotel', 'HotelController@showAll');
$router->get('/hotel/{id}', 'HotelController@detail');
$router->get('/komunitas', 'KomunitasController@showAll');
$router->get('/komunitas/kategori', 'KomunitasController@showKategori');
$router->get('/komunitas/{id}', 'KomunitasController@detail');
$router->get('/kuliner', 'KulinerController@showAll');
$router->get('/kuliner/{id}', 'KulinerController@detail');
$router->get('/pengumuman', 'PengumumanController@showAll');
$router->get('/pengumuman/{id}', 'PengumumanController@detail');
$router->get('/ruteangkot', 'RuteController@showAll');
$router->get('/ruteangkot/{id}', 'RuteController@detail');
$router->get('/tempatibadah', 'TempatIbadahController@showAll');
$router->get('/tempatibadah/{id}', 'TempatIbadahController@detail');
$router->get('/wisata', 'WisataController@showAll');
$router->get('/wisata/{id}', 'WisataController@detail');