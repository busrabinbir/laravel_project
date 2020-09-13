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

Route::get('/admin', 'AdminController@index');

Route::get('/', 'HomeController@createView');
Route::post('/create', 'HomeController@create');
Route::get('/index', 'HomeController@indexView');
Route::get('/sil/{id}', 'HomeController@delete')->where(array('id' => '[0-9]+'));
Route::post('/update/{id}', 'HomeController@update')->where(array('id' => '[0-9]+'));
Route::get('/update/{id}', 'HomeController@updateView')->where(array('id' => '[0-9]+'));

Route::get('/product-add', 'ProductController@productCreateView')->name('product.add');
Route::post('/product-create', 'ProductController@productCreate')->name('product.create');
Route::get('/product-list', 'ProductController@indexView')->name('product.list');

Route::get('/download', 'ExcelDownloadController@userDownload');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
