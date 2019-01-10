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

/*** ADMINISTRATIVE ROUTES ***/

Route::get('settings/','AdministrativoController@index')->name('admin.index');
Route::get('settings/register/provider','AdministrativoController@registrarProveedor')->name('admin.register.provider');
Route::get('settings/register/products','AdministrativoController@registrarProducto')->name('admin.register.product');

Route::post('settings/store/provider','AdministrativoController@guardarProveedor')->name('admin.store.provider');
Route::post('settings/store/products','AdministrativoController@guardarProducto')->name('admin.store.product');

Route::post('lote/get/products','LoteController@ObtenerProducto')->name('lote.getproducts');
Route::post('lote/get/mesures','LoteController@ObtenerMedidas')->name('lote.getmesures');

/*** END ADMINISTRATIVE ROUTES ***/

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



