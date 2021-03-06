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

Route::get('/', 'BackendController@index')->name('dashboard');

//OrderController
Route::resource('order', 'OrderController');
Route::post('/order/statuschange', 'OrderController@statuschanage')->name('order.statuschange');

//TeamController
Route::get('/login', 'TeamController@login')->name('login');
Route::post('/login', 'TeamController@processLogin')->name('login');
Route::get('/team', 'TeamController@index')->name('team.index');
Route::get('/team/add', 'TeamController@addTeam')->name('team.add');
Route::post('/addteam', 'TeamController@storeTeam')->name('team.store');
Route::get('/team/edit/{id}', 'TeamController@editTeam')->name('team.edit');
Route::post('/team/update/{id}', 'TeamController@updateTeam')->name('team.update');
Route::delete('/team/destroy/{id}', 'TeamController@destroyTeam')->name('team.destroy');

//LocationController
Route::resource('/location','LocationController');