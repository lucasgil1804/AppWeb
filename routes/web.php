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

// Route::get('/', function () {
//     return view('Inicio');
// });

Route::get('/', 'MyController@index')
	->name('inicio');

Route::get('/iniciarSesion', 'MyController@login')
->name('iniciarSesion');

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

/* Estado Equipo*/
Route::get('/estadoEquipo', 'MyController@estadoEquipo')
	->name('estadoEquipo');

Route::get('/estadoEquipo/consulta','ReparacionController@vistaConsulta')
	->name('consultaReparacion');

Route::post('/consultaEquipo','ReparacionController@consultaEquipo');
/* Estado Equipo*/

/* Reparaciones */
Route::get('/listaPCs', 'ReparacionController@listaPCs')
	->name('listaPCs')
	->middleware('auth');

Route::get('/listaNotebooks', 'ReparacionController@listaNotebooks')
	->name('listaNotebooks')
	->middleware('auth');

Route::get('/bajaReparacion/{reparacion}', 'ReparacionController@bajaReparacion')
	->where('reparacion', '[0-9]+')
	->name('adminBajaReparacion')
	->middleware('auth');

Route::get('/altaReparacion/{id}', 'ReparacionController@altaReparacion')
	->where('id', '[0-9]+')
	->name('adminAltaReparacion')
	->middleware('auth');

Route::get('/nuevaReparacion', 'ReparacionController@nuevaReparacion')
	->name('adminNuevaReparacion')
	->middleware('auth');

Route::get('/editarReparacion/{reparacion}', 'ReparacionController@EditarReparacion')
	->name('adminEditarReparacion')
	->middleware('auth');

Route::post('/guardarReparacion', 'ReparacionController@guardarReparacion')
	->middleware('auth');	

Route::get('/mostrarCliente/{id}', 'ReparacionController@mostrarCliente')
	->where('id', '[0-9]+')
	->middleware('auth');

Route::get('/tablaCliente', 'ReparacionController@tablaCliente')
	->middleware('auth');

Route::get('/formularioCliente/4', 'ReparacionController@nuevoCliente')
	->middleware('auth')
	->name('formularioCliente');

Route::post('/guardarCliente', 'ReparacionController@guardarCliente')
	->middleware('auth');

Route::get('/tablaEquipo', 'ReparacionController@tablaEquipo')
	->middleware('auth');

Route::get('/mostrarEquipo/{id}', 'ReparacionController@mostrarEquipo')
	->where('id', '[0-9]+')
	->middleware('auth');

Route::get('/formularioEquipo', 'ReparacionController@nuevoEquipo')
	->middleware('auth');

Route::get('/enDiagnostico', 'ReparacionController@enDiagnostico')
	->middleware('auth');

Route::get('/enReparacion', 'ReparacionController@enReparacion')
	->middleware('auth');	

Route::post('/guardarEquipo', 'ReparacionController@guardarEquipo')
	->middleware('auth');

Route::get('/tablaDetalle', 'ReparacionController@tablaDetalle')
	->middleware('auth');

Route::get('/quitarUltimoDetalle', 'ReparacionController@quitarUltimo')
	->middleware('auth');

/* Reparaciones */


Route::get('/index', 'AdminController@index')
	->name('adminIndex');

// Route::get('/listaUsuario', 'AdminController@listaUsuario')
// 	->name('adminListaUsuario');

Route::get('/nuevoUsuario/{tipoUser}', 'AdminController@nuevoUsuario')
    ->where('tipoUser', '[2-4]')
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

Route::get('/listaTecnicos', 'AdminController@listaTecnico')
	->name('adminListaTecnicos');

Route::get('/listaClientes', 'AdminController@listaCliente')
	->name('adminListaClientes');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/detalleReparacion/{id}', 'ReparacionController@detallesReparacion')
	->where('reparacion', '[0-9]+')
	->middleware('auth')
	->name('adminDetallesReparacion');