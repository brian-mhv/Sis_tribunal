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

Route::get('/docentes', 'DocentesController@index');
Route::get('/docentes/registrar', 'DocentesController@add');
Route::get('/docentes/registrarlote', 'DocentesController@addLote');

Route::get('/invitados', 'ProfesionalesController@invitados');
Route::post('/invitados', 'ProfesionalesController@save');
Route::get('/invitados/registrar', 'ProfesionalesController@add');
Route::get('/invitados/registrarlote', 'ProfesionalesController@addLote');

Route::get('/proyecto/registrar', 'ProyectosController@add');
Route::get('/proyecto/registrarlote', 'ProyectosController@addLote');

Route::get('/areas', 'AreasController@index');
Route::post('/areas', 'AreasController@save');
Route::get('/areas/registrar', 'AreasController@add');
Route::get('/areas/registrarlote', 'AreasController@addLote');

Route::get('help', 'HelpsController@index');

Route::get('about', 'AboutsController@index');