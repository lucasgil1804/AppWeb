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

Route::get('/', function () {
    return view('Inicio');
});

Route::get('/inicio', 'MyController@index')
	->name('inicio');

Route::get('/login', 'MyController@login');

Route::get('/contacto', 'MyController@contacto')
	->name('contacto');

Route::get('/quienessomos', 'MyController@quienessomos')
	->name('quienessomos');

Route::get('/reparacionPC', 'MyController@reparacionPC')
	->name('reparacionPC');

Route::get('/feedback', 'MyController@feedback')
	->name('feedback');

Route::get('/reparacionNotebook', 'MyController@reparacionNotebook')
	->name('reparacionNotebook');

Route::get('/estadoEquipo', 'MyController@estadoEquipo')
	->name('estadoEquipo');

Route::get('/index', 'AdminController@index')
	->name('adminIndex');

Route::get('/listaUsuario', 'AdminController@listaUsuario')
	->name('adminListaUsuario');

Route::get('/nuevoUsuario', 'AdminController@nuevoUsuario')
	->name('adminNuevoUsuario');

Route::post('/nuevoUsuario', 'AdminController@store');

Route::get('/prueba', 'MyController@pruebaForm')
	->name('prueba');

Route::get('/verDetalle/{id}', 'AdminController@detalles')
//Route::get('/verDetalle', 'AdminController@detalles')	
    ->where('id', '[0-9]+')
    ->name('adminVerDetalle');

Route::get('/editarUsuario/{user}', 'AdminController@editar')
//Route::get('/verDetalle', 'AdminController@detalles')	
    ->where('user', '[0-9]+')
    ->name('adminEditarUsuario');

Route::put('/editarUsuario/{user}', 'AdminController@update')
	->where('user', '[0-9]+')
	->name('adminUpdateUser');

Route::get('/bajaUsuario/{user}', 'AdminController@bajaUsuario')
	->where('user', '[0-9]+')
	->name('adminBajaUsuario');

Route::get('/altaUsuario/{id}', 'AdminController@altaUsuario')
	->where('id', '[0-9]+')
	->name('adminAltaUsuario');

Route::get('/listaEmpleados', 'AdminController@listaEmpleado')
	->name('adminListaEmpleados');