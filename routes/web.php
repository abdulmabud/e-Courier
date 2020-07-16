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


Route::resource('order', 'OrderController');

//TeamController
Route::get('/login', 'TeamController@login')->name('login');
Route::post('/login', 'TeamController@processLogin')->name('login');
Route::get('/team/add', 'TeamController@addTeam')->name('team.add');
Route::post('/addteam', 'TeamController@storeTeam')->name('team.store');