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

use App\Site;
use App\Link;
use App\Set;

/* Links */
Route::get('/', 'LinksController@index');
Route::get('/links/generate', 'LinksController@generateLinks');
Route::post('/link/create', 'LinksController@create');

/* Sets */
Route::get('/sets/create', 'SetController@create');
Route::post('/link/create', 'SetController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/users', 'AdminController@viewusers');
Route::get('/admin/sets', 'AdminController@viewsets');
Route::get('/admin/sites', 'AdminController@viewsites');


Route::get('datatable/users', 'DataTableController@getUsers')->name('datatable/users');