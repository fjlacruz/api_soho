<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//========================== Ruta del modulo de Usuarios =============================//
Route::get('usuarios', 'UsersController@getUsers')->name('getUsers');
Route::post('usuarios', 'UsersController@addUser')->name('addUser');
Route::get('login/{rut}/{clave}', 'UsersController@login')->name('login');
Route::get('logout/{token}', 'UsersController@logout')->name('logout');
Route::post('cambiar-clave/{id}/{clave}', 'UsersController@cambiarClave')->name('cambiarClave');


//========================== Ruta del modulo de Zapatos =============================//
Route::get('zapatos', 'ZapatosController@getAll')->name('getAll');
Route::post('zapatos', 'ZapatosController@add')->name('add');
Route::get('zapatos/{id}', 'ZapatosController@getZapato')->name('getZapato');
Route::post('zapatos/{id}', 'ZapatosController@editZapato')->name('editZapato');
Route::get('zapatos/delete/{id}', 'ZapatosController@deleteZapato')->name('deleteZapato');




