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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('lote','LoteController');

Route::get('hine', function() {
      return "Hola desde Hine";
});

Route::get('/registered', function() {
      return view ('lote.registered');
});

Route::get('/delivery', function() {
      return view ('lote.register_delivery');
});

Route::get('/report', function() {
      return view ('lote.reports');
});

Route::get('/consultreport', function() {
      return view ('lote.report_details');
});



