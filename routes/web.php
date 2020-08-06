<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'homeController@index');
Route::get('/vendedor', 'vendedoresController@index');
Route::post('/vendedor/agregar', 'vendedoresController@store');
Route::post('/vendedor/editar', 'vendedoresController@update');
Route::get('/vendedor/eliminar/{id}', 'vendedoresController@destroy');

Route::post('/ajax', 'vendedoresController@getVendedorAjax');

Route::get('cliente/{idVendedor}', 'clientesController@index');
Route::post('cliente/agregar', 'clientesController@store');
Route::get('cliente/eliminar/{id_cliente}/{idVendedor}', 'clientesController@destroy');
