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

Route::get('/','Auth\LoginController@showLoginForm');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('app', 'AppController@consultarPacientes')->name('app');

Route::get('pacientes', 'AppController@consultarPacientes')->name('consultar');
Route::get('registroPaciente', 'AppController@registroPacientes')->name('registroPaciente');
Route::any('agregarPaciente', 'AppController@agregarPacientes')->name('agregarPaciente');
Route::any('buscadorPaciente', 'AppController@buscadorPaciente')->name('buscadorPaciente');
Route::any('downloadFilepptx', 'AppController@downloadFilepptx')->name('downloadFilepptx');
Route::post('modificarDoctorPacientes', 'AppController@modificarDoctorPacientes')->name('modificarDoctorPacientes');
Route::post('modificarAsesorPacientes', 'AppController@modificarAsesorPacientes')->name('modificarAsesorPacientes');
Route::post('modificarImplantePaciente', 'AppController@modificarImplantePaciente')->name('modificarImplantePaciente');
Route::post('modificarTratamientoPaciente', 'AppController@modificarTratamientoPaciente')->name('modificarTratamientoPaciente');
Route::post('ponerModificarTratamientoPaciente', 'AppController@ponerModificarTratamientoPaciente')->name('ponerModificarTratamientoPaciente');

Route::any('agregarTratamiento', 'AppController@agregarTratamiento')->name('agregarTratamiento');
Route::any('registroTratamiento', 'AppController@registroTratamiento')->name('registroTratamiento');

Route::any('login', 'Auth\LoginController@login')->name('login');

Route::any('agregarTrabajo', 'TrabajosController@agregarTrabajo')->name('agregarTrabajo');
Route::any('registroTrabajo', 'TrabajosController@registroTrabajo')->name('registroTrabajo');
Route::get('trabajos', 'TrabajosController@consultarTrabajos')->name('consultarTrabajos');
Route::any('buscadorTrabajo', 'TrabajosController@buscadorTrabajo')->name('buscadorTrabajo');
Route::post('filtroTratamientos', 'TrabajosController@filtroTratamientos')->name('filtroTratamientos');
Route::post('modificarMaterialTrabajo', 'TrabajosController@modificarMaterialTrabajo')->name('modificarMaterialTrabajo');
Route::post('modificarTipoTrabajo', 'TrabajosController@modificarTipoTrabajo')->name('modificarTipoTrabajo');
Route::post('modificarColorTrabajo', 'TrabajosController@modificarColorTrabajo')->name('modificarColorTrabajo');
Route::post('modificarDiscoTrabajo', 'TrabajosController@modificarDiscoTrabajo')->name('modificarDiscoTrabajo');
Route::post('modificarMaquinaTrabajo', 'TrabajosController@modificarMaquinaTrabajo')->name('modificarMaquinaTrabajo');
Route::post('modificarTrabajo', 'TrabajosController@modificarTrabajo')->name('modificarTrabajo');

Route::any('registroDisco', 'DiscosController@registroDisco')->name('registroDisco');
Route::any('agregarDisco', 'DiscosController@agregarDisco')->name('agregarDisco');
Route::get('disco', 'DiscosController@consultarDiscos')->name('consultarDiscos');
Route::any('buscadorDisco', 'DiscosController@buscadorDisco')->name('buscadorDisco');
Route::post('darBajaDisco', 'DiscosController@darBajaDisco')->name('darBajaDisco');
Route::post('modificarColorDisco', 'DiscosController@modificarColorDisco')->name('modificarColorDisco');
Route::post('modificarMaterialDisco', 'DiscosController@modificarMaterialDisco')->name('modificarMaterialDisco');
Route::post('modificarMarcaDisco', 'DiscosController@modificarMarcaDisco')->name('modificarMarcaDisco');
Route::post('modificarDisco', 'DiscosController@modificarDisco')->name('modificarDisco');
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::fallback(function () {
    return view('bienvenido');
});