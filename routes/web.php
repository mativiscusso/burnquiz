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
    //dd(Auth::user()->role);
    return view('burnquiz.index');
})->name('burnquiz.index');

Route::get('/ranking', function () {
    return view('burnquiz.ranking');
})->name('burnquiz.ranking');
Route::get('/juego', function () {
    return view('burnquiz.juego');
})->name('burnquiz.juego');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/cargarpregunta', 'PreguntasController@create');

Route::post('/cargarpregunta', 'PreguntasController@store');

Route::get('/cargarpregunta/{id}', 'PreguntasController@edit');

