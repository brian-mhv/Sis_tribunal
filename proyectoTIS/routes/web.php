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
Route::get('/home', 'HomesController@index');
Route::post('/home', 'HomesController@getSesion');
Route::get('/logout', 'HomesController@logout');

Route::get('login','AuthsController@index');

Route::get('/tribunales', 'TribunalesController@index');
Route::post('/tribunales', 'TribunalesController@save');
Route::get('/tribunales/{id}', 'TribunalesController@add');

Route::get('/docentes', 'DocentesController@index');
Route::post('/docentes', 'DocentesController@save');
Route::get('/docentes/registrar', 'DocentesController@add');
Route::get('/docentes/registrarlote', 'DocentesController@addLote');

Route::get('/invitados', 'ProfesionalesController@invitados');
Route::post('/invitados', 'ProfesionalesController@save');
Route::get('/invitados/registrar', 'ProfesionalesController@add');
Route::get('/invitados/registrarlote', 'ProfesionalesController@addLote');

Route::get('/proyectos', 'ProyectosController@index');
//Route::post('/proyectos', 'ProyectosController@save');
//Route::get('/proyectos/registrarProy', 'ProyectosController@add');
//Route::get('/proyectos/registrarProyLote', 'ProyectosController@addLote');

Route::get('/areas', 'AreasController@index');
Route::post('/areas', 'AreasController@save');
Route::get('/areas/registrar', 'AreasController@add');
Route::get('/areas/registrarlote', 'AreasController@addLote');

Route::get('/estudiantes', 'EstudiantesController@index');
//Route::post('/estudiantes', 'EstudiantesController@save');
//Route::get('/estudiantes/registrar', 'EstudiantesController@add');

Route::get('help', 'HelpsController@index');

Route::get('about', 'AboutsController@index');


Route::get('importArea', 'ImportAreaController@import');
Route::get('importProfesional', 'ImportProfesionalController@import');

Route::get('/misAreas', 'PerfilDocente@addAreas');
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
