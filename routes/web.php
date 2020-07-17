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

	return view('welcome');
});

Auth::routes(['register' => false]);

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('registro');
Route::post('register', 'Auth\RegisterController@register')->name('register');
/*
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
 

 
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
 
// Email Verification Routes...
Route::emailVerification();
*/
 
Route::get('/home', 'HomeController@index')->name('home');


//Rutas de la solicitud

Route::get('/crear-solicitud', array(
	'as' =>'crearSolicitud' ,
	'middleware' => 'auth',
	'uses'=> 'solicitudController@crearSolicitud'
	));

Route::post('/guardar-solicitud', array(
	'as' =>'guardarSolicitud' ,
	'middleware' => 'auth',
	'uses'=> 'solicitudController@guardarSolicitud'
	));

Route::get('/buscarS/{seacrh?}', array(
	'as'=>'buscarSolicitud',
	'middleware'=>'auth',
	'uses'=>'GestioncdpController@buscarSolicitud'
));

Route::get('/mostrarS/{id_sol}', array(
	'as'=>'mostrarS',
	'middleware'=>'auth',
	'uses'=>'GestioncdpController@detalleSol'
));

Route::get('/editS/{id_sol}', array(
	'as'=>'editS',
	'middleware'=>'auth',
	'uses'=>'GestioncdpController@editSol'
));

Route::post('/updateS/{id_sol}', array(
	'as'=> 'updateS',
	'middleware'=>'auth',
	'uses'=>'GestioncdpController@actualizaSol'
));

//Rutas de CDP 

Route::get('/crear-cdp/{ident?}', array(
	'as'=>'crearCdp',
	'middleware'=>'auth',
	'uses'=>'CdpController@crearCdp'
));

Route::post('/guardar-cdp', array(
	'as'=>'guardarCdp',
	'middleware'=>'auth',
	'uses'=>'CdpController@guardarCdp'
));

Route::get('/gestionar-cdp', array(
	'as'=>'gestionarCdp',
	'middleware'=>'auth',
	'uses'=>'GestioncdpController@gestionarCdp'
));

Route::get('/buscarC/{search?}', array(
	'as'=>'buscarCdp',
	'middleware'=>'auth',
	'uses'=>'GestioncdpController@buscarCdp'
));

Route::get('/buscarA', array(
	'as'=>'buscarCdpAll',
	'middleware'=>'auth',
	'uses'=>'GestioncdpController@buscarCdpAll'
));

Route::get('/mostrarC/{id}', array(
	'as'=>'mostrarC',
	'middleware'=>'auth',
	'uses'=>'GestioncdpController@detalleCdp'
));

Route::get('/editC/{id}', array(
	'as'=>'editC',
	'middleware'=>'auth',
	'uses'=>'GestioncdpController@editCdp'
));

Route::post('/updateC/{id}', array(
	'as'=> 'updateC',
	'middleware'=>'auth',
	'uses'=>'GestioncdpController@actualizaCdp'
));

//rutas de proceso

Route::get('/crear-proceso', array(
	'as' =>'crearProceso' ,
	'middleware' => 'auth',
	'uses'=> 'ProcesoController@crearProceso'
	));

Route::post('/guardar-proceso', array(
	'as' =>'guardarProceso' ,
	'middleware' => 'auth',
	'uses'=> 'ProcesoController@guardarProceso'
	));

Route::get('/gestionar-proceso', array(
	'as'=>'gestionarProc',
	'middleware'=>'auth',
	'uses'=>'ProcesoController@gestionarProc'
));


Route::get('/buscarP/{seacrh?}', array(
	'as'=>'buscarP',
	'middleware'=>	'auth',
	'uses'=>'ProcesoController@buscarP'
));

Route::get('/mostrarP/{id}', array(
	'as'=>'mostrarP',
	'middleware'=>'auth',
	'uses'=>'ProcesoController@detalleProc'
));

Route::get('/editP/{id}', array(
	'as'=>'editP',
	'middleware'=>'auth',
	'uses'=>'ProcesoController@editProceso'
));

Route::post('/updateP/{id}', array(
	'as'=> 'updateP',
	'middleware'=>'auth',
	'uses'=>'ProcesoController@actualizaProceso'
));

//rutas de contrato

Route::get('/crear-contrato/{id?}', array(
	'as'=>'crearContrato',
	'middleware'=>'auth',
	'uses'=>'ContratoController@crearContrato'
));

Route::post('/guardar-contrato', array(
	'as'=> 'guardarContrato',
	'middleware'=>'auth',
	'uses'=>'ContratoController@guardarContrato'
));

Route::get('/gestionar-contrato', array(
	'as'=>'gestionarCon',
	'middleware'=>'auth',
	'uses'=>'ContratoController@gestionarCon'
));

Route::get('/mostrarCon/{id}', array(
	'as'=>'mostrarCo',
	'middleware'=>'auth',
	'uses'=>'ContratoController@detalleCon'
));

Route::get('/mostrarPerC/{id}', array(
	'as'=>'mostrarPerC',
	'middleware'=>'auth',
	'uses'=>'ContratoController@detalleConP'
));

Route::get('/buscarCon/{seacrh?}', array(
	'as'=>'buscarCon',
	'middleware'=>	'auth',
	'uses'=>'ContratoController@buscarContrato'
));

Route::get('/editCon/{id}', array(
	'as'=>'editCon',
	'middleware'=>'auth',
	'uses'=>'ContratoController@editContrato'
));

Route::post('/updateCon/{id}', array(
	'as'=> 'updateCon',
	'middleware'=>'auth',
	'uses'=>'ContratoController@actualizaContrato'
));

Route::get('/crear-rp/{id?}', array(
	'as'=>'crearRp',
	'middleware'=>'auth',
	'uses'=>'ContratoController@crearRp'
));

Route::post('/guardar-rp', array(
	'as'=> 'guardarRp',
	'middleware'=>'auth',
	'uses'=>'ContratoController@guardarRp'
));

Route::get('/buscarconPago', array(
	'as'=>'buscarconPago',
	'middleware'=>'auth',
	'uses'=>'PagoController@buscarconPago'
));

//rutas de Persona
Route::get('/crear-persona', array(
	'as'=>'crearPersona',
	'middleware'=>'auth',
	'uses'=>'PersonaController@crearPersona'
));

Route::post('/guardar-persona', array(
	'as'=> 'guardarPersona',
	'middleware'=>'auth',
	'uses'=>'PersonaController@guardarPersona'
));

Route::get('/gestionar-persona', array(
	'as'=>'gestionarPer',
	'middleware'=>'auth',
	'uses'=>'PersonaController@gestionarPer'
));

Route::get('/gestionar-per', array(
	'as'=>'gestionarPer2',
	'middleware'=>'auth',
	'uses'=>'PersonaController@gestionarPer2'
));

Route::get('/mostrarPer/{id}', array(
	'as'=>'mostrarPer',
	'middleware'=>'auth',
	'uses'=>'PersonaController@detallePer'
));

Route::get('/buscarPer/{seacrh?}', array(
	'as'=>'buscarPer',
	'middleware'=>	'auth',
	'uses'=>'PersonaController@buscarPersona'
));

Route::get('/buscarPer2/{seacrh?}', array(
	'as'=>'buscarPer2',
	'middleware'=>	'auth',
	'uses'=>'PersonaController@buscarPersona2'
));

Route::get('/editPer/{id}', array(
	'as'=>'editPer',
	'middleware'=>'auth',
	'uses'=>'PersonaController@editPersona'
));

Route::post('/updatePer/{id}', array(
	'as'=> 'updatePer',
	'middleware'=>'auth',
	'uses'=>'PersonaController@actualizaPersona'
));

//rutas de Garantía
Route::get('/crear-garantia', array(
	'as'=>'crearGarantia',
	'middleware'=>'auth',
	'uses'=>'GarantiaController@crearGarantia'
));

Route::post('/guardar-garantia', array(
	'as'=> 'guardarGarantia',
	'middleware'=>'auth',
	'uses'=>'GarantiaController@guardarGarantia'
));

Route::get('/gestionar-garantia', array(
	'as'=>'gestionarGar',
	'middleware'=>'auth',
	'uses'=>'GarantiaController@gestionarGar'
));

Route::get('/mostrarGar/{id}', array(
	'as'=>'mostrarGar',
	'middleware'=>'auth',
	'uses'=>'GarantiaController@detalleGar'
));

Route::get('/buscarGar/{seacrh?}', array(
	'as'=>'buscarGar',
	'middleware'=>	'auth',
	'uses'=>'GarantiaController@buscarGarantia'
));

Route::get('/editGar/{id}', array(
	'as'=>'editGar',
	'middleware'=>'auth',
	'uses'=>'GarantiaController@editGarantia'
));

Route::post('/updateGar/{id}', array(
	'as'=> 'updateGar',
	'middleware'=>'auth',
	'uses'=>'GarantiaController@actualizaGarantia'
));

Route::get('/borraGar/{id}', array(
	'as'=> 'borraGar',
	'middleware'=>'auth',
	'uses'=>'GarantiaController@borraGar'
));
//rutas de pago
Route::get('/crear-pago', array(
	'as'=>'crearpago',
	'middleware'=>'auth',
	'uses'=>'PagoController@crearPago'
));

Route::get('/crearPago2/{search?},{saldo?}', array(
	'as'=>'crearPago2',
	'middleware'=>'auth',
	'uses'=>'PagoController@crearPago2'
));

Route::post('/guardar-pago', array(
	'as'=> 'guardarPago',
	'middleware'=>'auth',
	'uses'=>'PagoController@guardarPago'
));

Route::get('/gestionar-pago', array(
	'as'=>'gestionarPago',
	'middleware'=>'auth',
	'uses'=>'PagoController@gestionarPago'
));

Route::get('/mostrarPago/{id}', array(
	'as'=>'mostrarPago',
	'middleware'=>'auth',
	'uses'=>'PagoController@detallePago'
));

Route::get('/buscarPago/{seacrh?}', array(
	'as'=>'buscarPago',
	'middleware'=>	'auth',
	'uses'=>'PagoController@buscarPago'
));

Route::get('/editPago/{id}', array(
	'as'=>'editPago',
	'middleware'=>'auth',
	'uses'=>'PagoController@editPago'
));

Route::post('/updatePago/{id}', array(
	'as'=> 'updatePago',
	'middleware'=>'auth',
	'uses'=>'PagoController@actualizaPago'
));

Route::get('/borraPago/{id}', array(
	'as'=> 'borraPago',
	'middleware'=>'auth',
	'uses'=>'PagoController@borraPago'
));

//las de los reportes

Route::get('/gestionar-report/{opc?}', array(
	'as'=>'gestionarReport',
	'middleware'=>'auth',
	'uses'=>'ReporteController@gestionarReporte'
));


//REPORTES GENERALES
Route::get('/export', array(
	'as'=>'exportCon',
	'uses'=> 'ReporteController@export'
	));

Route::get('/adj', array(
	'as'=>'exportadj',
	'uses'=> 'ReporteController@adjudicados'
	));

Route::get('/exportPer', array(
	'as'=>'exportPer',
	'uses'=> 'ReporteController@personas'
	));

Route::get('/export_ig', array(
	'as'=>'export_ig',
	'uses'=> 'ReporteController@export_ig'
	));

Route::get('/export_maa', array(
	'as'=>'export_maa',
	'uses'=> 'ReporteController@export_maa'
	));

//REPORTES DE AUDITORIA
Route::get('/export_maa', array(
	'as'=>'export_maa',
	'uses'=> 'ReporteController@export_maa'
	));

Route::get('/export_ep', array(
	'as'=>'export_ep',
	'uses'=> 'ReporteController@export_ep'
	));

Route::get('/export_gar', array(
	'as'=>'export_gar',
	'uses'=> 'ReporteController@export_gar'
	));

Route::get('/export_pagos', array(
	'as'=>'export_pagos',
	'uses'=> 'ReporteController@export_pagos'
	));