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
Route::get('vendedor', 'vendedoresController@index');
Route::post('vendedor/agregar', 'vendedoresController@store');
Route::post('vendedor/editar', 'vendedoresController@update');
Route::get('vendedor/eliminar/{id}', 'vendedoresController@destroy');
Route::get('vendedor/getVendedor', 'vendedoresController@getListaVendedoresAjax');

Route::get('cliente/getCliente', 'clientesController@getListaClientesAjax');
Route::get('cliente/{idVendedor}', 'clientesController@index');
Route::post('cliente/agregar', 'clientesController@store');
Route::get('cliente/eliminar/{id_cliente}/{idVendedor}', 'clientesController@destroy');
Route::post('cliente/ajax', 'vendedoresController@getVendedorAjax');

Route::post('proyecto/ajax', 'clientesController@getClienteAjax');
Route::get('proyecto/{idCliente}', 'proyectosController@index');
Route::post('proyecto/agregar', 'proyectosController@store');
Route::get('proyecto/eliminar/{idProyecto}/{idCliente}', 'proyectosController@destroy');
Route::get('proyecto/detalleProyecto/{id_proyecto}', 'proyectosController@showDetail');
Route::get('proyecto/detalleFactura/{id_proyecto}', 'proyectosController@showFactura');

Route::get('proveedor/getProveedor', 'proveedoresController@getListaProveedoresAjax');

Route::post('orden/agregar', 'ordenesCompraController@store')->name('orden.store');
Route::post('viatico/agregar', 'viaticosController@store')->name('viatico.store');
Route::post('obra/agregar', 'manosObraController@store')->name('obra.store');
Route::post('factura/agregar', 'facturasController@store')->name('factura.store');