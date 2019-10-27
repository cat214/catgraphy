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
use Illuminate\Http\Request;

Route::get('/index','PhotosController@index');
Route::post('/index','PhotosController@upload')->middleware('auth');

Auth::routes();

Route::get('/photos/create','PhotosController@create')->middleware('auth');
Route::get('/photos/{photo_id}','PhotosController@detail');
Route::get('/photos/{photo_id}/edit','PhotosController@edit')->middleware('auth');
Route::post('/photos/{photo_id}/edit','PhotosController@update')->middleware('auth');
Route::get('/photos/{photo_id}/delete','PhotosController@delete')->middleware('auth');


Route::get('/mypage','UsersController@mypage')->middleware('auth');







