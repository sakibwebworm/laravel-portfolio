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

Route::get('/', 'PageController@home');
Route::post('/contact', 'PageController@contact');
Route::get('/work/{id}', 'WorkController@show');
Route::post('/add_work/','PageController@work');
Route::get('/update_work/{id}','PageController@edit');
Route::post('/update_work/{id}','PageController@update');
Route::get('/delete_work/{id}','PageController@delete');
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

