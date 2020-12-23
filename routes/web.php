<?php
use App\Exports\ExportCliente;
use Maatwebsite\Excel\Facades\Excel;

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
Route::get('/exportClienteExcel', function () {
    return Excel::download(new ExportCliente, 'clientes.xlsx');
})->name('clienteExcel');

Route::get('/exportClientePdf', function () {
    return Excel::download(new ExportCliente, 'clientes.pdf');
})
->name('clientePdf');

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

Route::get('/bajaDetalle/{reparacion}', 'ReparacionController@bajaDetalle')
	->where('detalle', '[0-9]+')
//	->name('adminBajaReparacion')
	->middleware('auth');	

Route::get('/altaReparacion/{id}', 'ReparacionController@altaReparacion')
	->where('id', '[0-9]+')
	->name('adminAltaReparacion')
	->middleware('auth');

Route::get('/nuevaReparacion', 'ReparacionController@nuevaReparacion')
	->name('adminNuevaReparacion')
	->middleware('auth','role: 2');

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

Route::get('/agregarDetalle/{id_reparacion}', 'ReparacionController@agregarDetalle')
	->where('id_reparacion', '[0-9]+')
	->middleware('auth');

Route::get('/guardarDetalle', 'ReparacionController@guardarDetalle')
	->middleware('auth');	


Route::post('/guardarEquipo', 'ReparacionController@guardarEquipo')
	->middleware('auth');

Route::get('/tablaDetalle', 'ReparacionController@tablaDetalle')
	->middleware('auth');

Route::get('/quitarUltimoDetalle', 'ReparacionController@quitarUltimo')
	->middleware('auth');

// Route::get('/editarDetalle', 'ReparacionController@editarDetalle')
// 	->middleware('auth')
// 	->name('adminEditarDetalle');

Route::get('/updateCheck/{id_detalle}', 'ReparacionController@updateCheck')
	->where('id_detalle', '[0-9]+')
	->middleware('auth');

Route::get('/detalleReparacion/{id}', 'ReparacionController@detallesReparacion')
	->where('reparacion', '[0-9]+')
	->middleware('auth')
	->name('adminDetallesReparacion');

Route::get('/editarFila/{id_detalle}', 'ReparacionController@editarFila')
	->where('id_detalle', '[0-9]+')
	->middleware('auth');

Route::get('/guardarFila/{id_detalle}', 'ReparacionController@guardarFila')
	->where('id_detalle', '[0-9]+')
	->middleware('auth');

Route::put('/updateReparacion/{reparacion}', 'ReparacionController@updateReparacion')
	->where('reparacion', '[0-9]+')
	->middleware('auth');

/* Reparaciones */


Route::get('/index', 'AdminController@index')
	->name('adminIndex');

// Route::get('/index', 'AdminController@index')
// 	->name('adminIndex')->middleware('auth','role:Administrador');

// Route::get('/listaUsuario', 'AdminController@listaUsuario')
// 	->name('adminListaUsuario');

Route::get('/nuevoUsuario/{tipoUser}', 'AdminController@nuevoUsuario')
    ->where('tipoUser', '[2-4]')
	->name('adminNuevoUsuario')
	->middleware('role: 2');

Route::post('/nuevoUsuario', 'AdminController@store');

// Route::get('/prueba', 'MyController@pruebaForm')
// 	->name('prueba');

Route::get('/verDetalle/{id}', 'AdminController@detalles')
//Route::get('/verDetalle', 'AdminController@detalles')	
    ->where('id', '[0-9]+')
    ->name('adminVerDetalle')
    ->middleware('role: 2');

Route::get('/editarUsuario/{user}', 'AdminController@editar')
//Route::get('/verDetalle', 'AdminController@detalles')	
    ->where('user', '[0-9]+')
    ->name('adminEditarUsuario')
    ->middleware('role: 2');

Route::put('/editarUsuario/{user}', 'AdminController@update')
	->where('user', '[0-9]+')
	->name('adminUpdateUser')
	->middleware('role: 2');

Route::get('/bajaUsuario/{user}', 'AdminController@bajaUsuario')
	->where('user', '[0-9]+')
	->name('adminBajaUsuario')
	->middleware('role: 2');

Route::get('/altaUsuario/{id}', 'AdminController@altaUsuario')
	->where('id', '[0-9]+')
	->name('adminAltaUsuario')
	->middleware('role: 2');

Route::get('/listaEmpleados', 'AdminController@listaEmpleado')
	->name('adminListaEmpleados')
	->middleware('role: 1');

Route::get('/listaTecnicos', 'AdminController@listaTecnico')
	->name('adminListaTecnicos')
	->middleware('role: 1');

Route::get('/listaClientes', 'AdminController@listaCliente')
	->name('adminListaClientes')
	->middleware('role: 2');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/customer/print-pdf/{id}', [ 'as' => 'customer.printpdf', 'uses' => 'CustomerController@printPDF'])
	->where('id', '[0-9]+');

// Route::get('/customer/pdf-factura/{id}', [ 'as' => 'customer.printpdf', 'uses' => 'CustomerController@printFacturaPDF'])
// 	->where('id', '[0-9]+');

Route::get('/customer/pdf-factura/{id}', 'CustomerController@printFacturaPDF')
	->where('id', '[0-9]+')
	->name('adminFacturaPDF');

// Route::get('/print-pdf', function() {
// 	return view('Admin.pdf_view');
// });
	
Route::get('/reportesBarras', 'ReportesController@mostrarBarras')
	->name('adminReporteBarras');

Route::get('/reparacionesMes/{anio}', 'ReportesController@reparacionesMes')
	->where('anio', '[0-9]+');

Route::get('/reportesTorta', 'ReportesController@mostrarTorta')
	->name('adminReporteTorta');

Route::get('/reportesLinea', 'ReportesController@mostrarLinea')
	->name('adminReporteLinea');

Route::get('/ingresosMensuales/{anio}', 'ReportesController@ingresosMensuales')
	->where('anio', '[0-9]+');