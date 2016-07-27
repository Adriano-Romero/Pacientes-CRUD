<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

Route::get('/', 'ProcedimentoController@index');

Route::resource('procedimentos', 'ProcedimentoController');
Route::resource('exames', 'ExameController');

Route::resource('pacientes', 'PacienteController');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/perfil', [
	'middleware' => 'auth',
	'uses' => 'UserController@showProfile',
]);

Route::get('/relatorio', 'UserController@testeRaw');
