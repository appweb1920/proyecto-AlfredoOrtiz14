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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Perfil
Route::get('/perfil', 'UsuarioController@index')->middleware('auth');
Route::post('/perfilActualiza', 'UsuarioController@actualizaDatosEntrega')->middleware('auth');

//Productos
Route::get('/', 'ProductoController@index');
Route::get('/nuevoProducto', 'ProductoController@nuevoProducto')->middleware('auth');
Route::post('/insertaProducto', 'ProductoController@store')->middleware('auth');
Route::get('/verProducto/{id}', 'ProductoController@verProducto');
Route::get('/actualizaProducto/{id}', 'ProductoController@show')->middleware('auth');
Route::post('/actualizaProd', 'ProductoController@actualiza')->middleware('auth');
Route::get('/eliminaProducto/{id}', 'ProductoController@destroy')->middleware('auth');
Route::get('/oficina', 'ProductoController@verOficina');
Route::get('/hogar', 'ProductoController@verHogar');
Route::get('/cocina', 'ProductoController@verCocina');
Route::get('/busca', 'ProductoController@busca');

//Carrito
Route::get('/carrito/{id}', 'CarritoController@show')->middleware('auth');;
Route::get('/agregaCarrito/{id}', 'CarritoController@store')->middleware('auth');
Route::post('/actualizaCar/{id}', 'CarritoController@actualiza')->middleware('auth');
Route::get('/eliminaProdCar/{id}', 'CarritoController@destroy')->middleware('auth');

//Pedido
Route::get('/hacerPedido', 'PedidoController@store')->middleware('auth');