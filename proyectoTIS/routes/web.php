<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//rutas de las diferentes paginas 
Route::get('/', 'HomesController@index');
Route::get('home', 'HomesController@index');

Route::get('login','AuthsController@index');

Route::get('/docente/registrarProf', 'ProfesionalesController@index');
Route::get('/docente/registrarProfLote', 'ProfesionalesController@index2');

Route::get('/proyecto/registrarProy', 'ProyectosController@index');
Route::get('/proyecto/registrarProyLote', 'ProyectosController@index2');

Route::get('/areas', 'AreasController@index');
Route::post('/areas', 'AreasController@save');
Route::get('/areas/registrarArea', 'AreasController@add');
Route::get('/areas/registrarAreaLote', 'AreasController@addLote');

Route::get('help', 'HelpsController@index');

Route::get('about', 'AboutsController@index');