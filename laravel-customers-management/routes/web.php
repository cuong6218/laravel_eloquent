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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->group(function (){
    Route::get('dashboard', 'LayoutController@showDashboard')->name('layout.showDashboard');
    Route::prefix('customers')->group(function(){
        Route::get('/view', 'CustomerController@getAll')->name('customers.view');
        Route::get('/add', 'CustomerController@showFormAdd')->name('customers.showFormAdd');
        Route::post('/add', 'CustomerController@addCustomer')->name('customers.addCustomer');
        Route::get('/{id}/delete', 'CustomerController@deleteCustomer')->name('customers.deleteCustomer');
        Route::get('/edit', 'CustomerController@showEditForm')->name('customers.showEditForm');
    });
});

