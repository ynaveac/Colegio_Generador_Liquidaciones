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

Route::get('/', 'PagesController@login')->name('login');
Route::get('/home', 'PagesController@home')->name('home')->middleware('auth');

//-- Segmento de Validación de Sesión de Usuario y Cerrado de Sesión --//
Route::post('iniciar-sesion', 'AutenticacionesController@iniciarSesion');
Route::post('cerrar-Sesion', 'AutenticacionesController@cerrarSesion');
//---------------------------------------------------------------------//

//-- Mantenedor de Genero --//
Route::resource('/genero', 'GeneroController')->middleware('auth');

//-- Mantenedor de Cargo --//
Route::resource('/cargo', 'CargoController')->middleware('auth');

//-- Mantenedor de Depto --//
Route::resource('/depto', 'DeptoController')->middleware('auth');

//-- Empleados --//
Route::resource('/empleados', 'EmpleadosController')->middleware('auth');

//-- Unidad de Fomento --//
Route::get('/api', 'UfController@api')->middleware('auth');
Route::post('/uf_m', 'UfController@uf_m')->middleware('auth');
Route::resource('/uf', 'UfController')->middleware('auth');

//-- Gratificación --//
Route::resource('/gratificacion', 'GratificacionController')->middleware('auth');

//-- tabla impuesto unico --//
Route::resource('/imp_unico', 'Impuesto_unicoController')->middleware('auth');

//-- tabla de AFP --//
Route::resource('/afp', 'AfpController')->middleware('auth');

//-- Listado de Salud --//
Route::resource('/salud', 'SaludController')->middleware('auth');

//-- Listado de Salud --//
Route::resource('/plazocontrato', 'PlazoContratoController')->middleware('auth');

//-- Listado de Caja Compensación --//
Route::resource('/cajacompensacion', 'CajaCompensacionController')->middleware('auth');

//-- Configuracion de Empresas --//
Route::resource('/empresa', 'EmpresasController')->middleware('auth');

//-- Configuracion de Nacionalidad --//
Route::resource('/nacionalidad', 'NacionalidadController')->middleware('auth');

//-- Configuracion de Horarios --//
Route::resource('/horario', 'HorariosController')->middleware('auth');

//-- Configuracion de Cesantia --//
Route::resource('/cesantia', 'CesantiaController')->middleware('auth');

//-- Configuracion Modo Pago --//
Route::resource('/modopago', 'ModopagoController')->middleware('auth');

//-- Configuracion Banco --//
Route::resource('/banco', 'BancoController')->middleware('auth');

//-- Configuracion Tipo de Cuenta --//
Route::resource('/tipocuenta', 'tipocuentaController')->middleware('auth');

//-- Configuracion Contratos --//
Route::resource('/contratos', 'ContratosController')->middleware('auth');

//-- Configuracion Periodo Liq --//
Route::resource('/periodo_liq', 'PeriodoController')->middleware('auth');

//-- Configuracion Haberes y Descuentos --//
Route::resource('/haberes', 'HaberesController')->middleware('auth');

//-- Configuracion Haberes y Descuentos dinamicos --//
Route::resource('/haberesdinamicos', 'HaberesDinamicosController')->middleware('auth');

//-- Configuracion Asistencia --//
Route::resource('/asistencia', 'AsistenciaController')->middleware('auth');
Route::get('/asistencia_rut', 'AsistenciaController@rut')->middleware('auth');