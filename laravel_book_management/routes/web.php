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

Route::prefix('admin')->group(function ()
{
    Route::get('dashboard', 'LayoutController@showDashboard')->name('dashboard.showDashboard');
    Route::prefix('books')->group(function()
    {
        Route::get('list', 'BookController@showList')->name('books.showList');
        Route::get('/add', 'BookController@showFormAdd')->name('books.showFormAdd');
        Route::post('/add', 'BookController@addBook')->name('books.addBook');
        Route::get('/{id}/delete', 'BookController@deleteBook')->name('books.deleteBook');
        Route::get('{id}/update', 'BookController@showFormUpdate')->name('books.showFormUpdate');
        Route::post('/{id}/update', 'BookController@updateBook')->name('books.updateBook');
        Route::post('/search', 'BookController@searchBook')->name('books.searchBook');
    });
    Route::prefix('types')->group(function()
    {
        Route::get('list', 'TypeController@showList')->name('types.showList');
        Route::get('/add', 'TypeController@showFormAdd')->name('types.showFormAdd');
        Route::post('/add', 'TypeController@addType')->name('types.addType');
        Route::get('/{id}/delete', 'TypeController@deleteType')->name('types.deleteType');
        Route::get('/{id}/update', 'TypeController@showFormUpdate')->name('types.showFormUpdate');
        Route::post('/{id}/update', 'TypeController@updateType')->name('types.updateType');
    });
    Route::prefix('readers')->group(function()
    {
        Route::get('list', 'ReaderController@showList')->name('readers.showList');
        Route::get('/add', 'ReaderController@showFormAdd')->name('readers.showFormAdd');
        Route::post('/add', 'ReaderController@addReader')->name('readers.addReader');
        Route::get('/{id}/delete', 'ReaderController@deleteReader')->name('readers.deleteReader');
        Route::get('/{id}/update','ReaderController@showFormUpdate')->name('readers.showFormUpdate');
        Route::post('/{id}/update', 'ReaderController@updateReader')->name('readers.updateReader');
    });
});
