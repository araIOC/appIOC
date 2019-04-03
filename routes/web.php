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
Route::get('app', 'AppController@index')->name('app');

Route::get('pacientes', 'AppController@consultarPacientes')->name('consultar');
Route::get('registroPaciente', 'AppController@registroPacientes')->name('registroPaciente');
Route::any('agregarPaciente', 'AppController@agregarPacientes')->name('agregarPaciente');
//Route::DELETE('eliminarPaciente', 'AppController@eliminarPaciente')->name('eliminarPaciente');

Route::any('agregarTratamiento', 'AppController@agregarTratamiento')->name('agregarTratamiento');

Route::any('login', 'Auth\LoginController@login')->name('login');

Route::any('agregarTrabajo', 'TrabajosController@agregarTrabajo')->name('agregarTrabajo');
Route::any('registroTrabajo', 'TrabajosController@registroTrabajo')->name('registroTrabajo');
Route::get('trabajos', 'TrabajosController@consultarTrabajos')->name('consultarTrabajos');

Route::any('registroDisco', 'DiscosController@registroDisco')->name('registroDisco');
Route::any('agregarDisco', 'DiscosController@agregarDisco')->name('agregarDisco');
Route::get('disco', 'DiscosController@consultarDiscos')->name('consultarDiscos');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::fallback(function () {
    return view('bienvenido');
});