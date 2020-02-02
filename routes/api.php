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


Route::group(['middleware' => ['cors']], function () {
Route::get('usuarios', 'UsersController@getUsers')->name('getUsers');
Route::get('usuarios/{id}', 'UsersController@getuserId')->name('getuserId');
Route::post('usuarios', 'UsersController@addUser')->name('addUser');
Route::post('login/', 'UsersController@login')->name('login');
Route::post('logout/', 'UsersController@logout')->name('logout');
Route::post('cambiar-clave/{id}', 'UsersController@cambiarClave')->name('cambiarClave');


//========================== Ruta del modulo de Zapatos =============================//
Route::get('zapatos', 'ZapatosController@getAll')->name('getAll');
Route::post('zapatos', 'ZapatosController@add')->name('add');
Route::get('zapatos/{id}', 'ZapatosController@getZapato')->name('getZapato');
Route::post('zapatos/{id}', 'ZapatosController@editZapato')->name('editZapato');
Route::get('zapatos/delete/{id}', 'ZapatosController@deleteZapato')->name('deleteZapato');
});

