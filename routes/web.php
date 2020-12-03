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
Route::post('/actualizaProducto/{id}', 'ProductoController@actualiza')->middleware('auth');
Route::get('/eliminaProducto/{id}', 'ProductoController@destroy')->middleware('auth');