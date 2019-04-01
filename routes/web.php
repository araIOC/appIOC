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
Route::get('paciente', 'AppController@registroPacientes')->name('agregar');
Route::any('agregarPaciente', 'AppController@agregarPacientes')->name('agregarPaciente');
Route::any('agregarTratamiento', 'AppController@agregarTratamiento')->name('agregarTratamiento');
Route::any('login', 'Auth\LoginController@login')->name('login');

Route::fallback(function () {
    return view('bienvenido');
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
