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

Route::get('/', 'UsuarioController@index')->name('inicio');

Route::post('/agregar', 'UsuarioController@store')->name('store');

Route::get('/editar/{id}', 'UsuarioController@edit')->name('editar');

Route::put('/update/{id}', 'UsuarioController@update')->name('update');

Route::delete('/eliminar/{id}', 'UsuarioController@destroy')->name('eliminar');
