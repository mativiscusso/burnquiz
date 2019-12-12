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

Route::get('/', function () {
    return view('burnquiz.index');
})->name('burnquiz.index');

Route::get('/ranking', function () {
    return view('burnquiz.ranking');
})->name('burnquiz.ranking');

Route::get('/juego', 'JuegoController@traerDatos');

Route::post('/juego/next', 'JuegoController@verificacion');
//listar preguntas
Route::get('/preguntas', 'PostController@index');
//agregar preguntas
//mostrar formulario agregar
Route::get('/preguntas/agregar', 'PreguntasController@create');
//procesar formulario agregar
Route::post('/preguntas/agregar', 'PreguntasController@store');
//modificar preguntas
//mostrar formulario editar
Route::get('/preguntas/modificar/{id}', 'PreguntasController@edit');
//procesar formulario editar
Route::post('/preguntas/modificar', 'PreguntasController@update')->middleware('admin');
//eliminar preguntas
Route::get('/preguntas/eliminar/{id}', 'PreguntasController@destroy')->middleware('admin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



