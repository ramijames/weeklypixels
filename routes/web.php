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

Auth::routes();

// Home
Route::get('/', 'LinksController@index');
Route::get('/home', 'HomeController@index')->name('home');

// Admin
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/users', 'AdminController@viewusers');
Route::get('/admin/roles', 'AdminController@viewroles');

// Links
// Route::get('/links/generate', 'LinksController@generateLinks');
// Route::post('/link/create', 'LinksController@create');
Route::get('datatables/getlinks', 'DataTableController@getLinks')->name('datatables/getlinks');
Route::get('/admin/links', 'AdminController@viewlinks');
Route::post('/admin/links/store', 'LinksController@store');
Route::get('/admin/links/destroy/{link}', 'LinksController@destroy');

// LightboxLinks
Route::get('/admin/lightboxlinks/destroy/{lightboxlink}', 'LightboxLinkController@destroy');
Route::get('/admin/lightboxlinks/clear/', 'LightboxLinkController@clear');
Route::get('/admin/lightboxlinks/add/{lightboxlink}', 'LightboxLinkController@add');

//Sets
// Route::get('/sets/', 'SetController@create');
// Route::post('/sets/create', 'SetController@create');
Route::get('/admin/sets', 'AdminController@viewsets');
Route::post('/admin/sets/store', 'SetController@store');
Route::get('/admin/sets/generate', 'SetController@generate');
Route::get('/admin/sets/destroy/{set}', 'SetController@destroy');
Route::get('datatable/sets', 'DataTableController@getSets')->name('datatable/sets');

// Sites
Route::get('/admin/sites', 'AdminController@viewsites');
Route::post('/admin/sites/store', 'SiteController@store');
Route::get('/admin/sites/destroy/{site}', 'SiteController@destroy');
Route::get('/admin/sites/get/{site}', 'SiteController@getlinks');
Route::get('datatable/sites', 'DataTableController@getSites')->name('datatable/sites');

// Users
Route::get('/admin/user/{user}', 'UserController@show');
Route::post('/admin/user/update/{user}', 'UserController@update');
Route::get('/admin/users/destroy/{user}', 'UserController@destroy');
Route::get('datatable/users', 'DataTableController@getUsers')->name('datatable/users');