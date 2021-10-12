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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('Auth.login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/recentItem', 'HomeController@recentAddedItem')->name('recentAddedItem');
Route::resource('/item', 'ItemController');
Route::resource('/sale', 'SaleController');
Route::resource('/supplier', 'SupplierController');
Route::resource('/purchase', 'PurchaseController');
Route::get('/a', 'SupplierController@a')->name('a');
Route::resource('/testing', 'TestingController');
Route::get('/report', 'ReportController@index')->name('salesreport');
Route::post('/filterByDate', 'ReportController@filterByDate')->name('filterByDate');
Route::get('/getPDF', 'ReportController@getPDF')->name('getPDF');