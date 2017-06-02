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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::any('/import', 'ImportController')->name('import');
Route::any('/patch', 'PatchController')->name('patch');

Route::resource('/users', 'UserController');

Route::post('/users/{id}/reset', 'UserExtraController@reset')->name('users.reset');

