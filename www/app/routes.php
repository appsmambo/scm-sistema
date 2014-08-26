<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@inicio');

Route::get('/login', function()
{
	return View::make('login');
});
Route::post('/login', 'HomeController@doLogin');

//http://laravel.com/docs/security#protecting-routes
/*Route::post('/login', array('before' => 'csrf', function()
{
    return 'You gave a valid CSRF token!';
}));*/

Route::get('/logout', 'HomeController@doLogout');

Route::group(array('before' => 'auth'), function()
{
	Route::get('/solicitante', 'SolicitanteController@index');
	Route::get('/solicitante/nuevo', 'SolicitanteController@nuevoRegistro');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('/login');
});

// 404
App::missing(function($exception) {
	return View::make('404');
});


Route::get('/empresa', 'EmpresaController@index');
Route::get('/empresa/nuevo', 'EmpresaController@nuevoRegistro');
Route::post('/empresa/guardar', 'EmpresaController@grabarRegistro');
Route::get('/empresa/mostrar/{id}', 'EmpresaController@mostrarRegistro')->where('id', '[0-9]+');
Route::post('/empresa/editar', 'EmpresaController@editarRegistro');


Route::get('/alumno', 'AlumnoController@index');
Route::get('/alumno/nuevo', 'AlumnoController@nuevoRegistro');
Route::post('/alumno/guardar', 'AlumnoController@grabarRegistro');
Route::get('/alumno/mostrar/{id}', 'AlumnoController@mostrarRegistro')->where('id', '[0-9]+');
Route::post('/alumno/editar', 'AlumnoController@editarRegistro');


Route::get('/operacion', 'OperacionController@index');
Route::get('/operacion/nuevo', 'OperacionController@nuevoRegistro');
Route::post('/operacion/guardar', 'OperacionController@grabarRegistro');
Route::get('/operacion/mostrar/{id}', 'OperacionController@mostrarRegistro')->where('id', '[0-9]+');
Route::post('/operacion/editar', 'OperacionController@editarRegistro');


Route::get('/tipo-conductor', 'TipoConductorController@index');
Route::get('/tipo-conductor/nuevo', 'TipoConductorController@nuevoRegistro');
Route::post('/tipo-conductor/guardar', 'TipoConductorController@grabarRegistro');
Route::get('/tipo-conductor/mostrar/{id}', 'TipoConductorController@mostrarRegistro')->where('id', '[0-9]+');
Route::post('/tipo-conductor/editar', 'TipoConductorController@editarRegistro');


Route::get('/cursos', 'MatrizController@index');
Route::get('/cursos/nuevo', 'MatrizController@nuevoRegistro');
