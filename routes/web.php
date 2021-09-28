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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//file's routes

Route::get('/file/create' , "FileController@create")->name('file.create');
Route::post('/file/create' , "FileController@store")->name('file.store');
Route::get('/files' , "FileController@index")->name('file.index');
Route::get('/file/edit{id}' , "FileController@edit")->name('file.edit');
Route::get('/file/show{id}' , "FileController@show")->name('file.show');
Route::post('/file/edit{id}' , "FileController@update")->name('file.update');
Route::get('/file/delete{id}' , "FileController@destroy")->name('file.destroy');
Route::get('/file/download{id}' , "FileController@download")->name('file.download');

