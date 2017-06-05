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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::any('/import', 'ImportController')->name('import');
Route::any('/patch', 'PatchController')->name('patch');

Route::resource('/users', 'UserController');


Route::post('/users/{id}/reset', 'UserExtraController@reset')->name('users.reset');
Route::get('/my', 'UserExtraController@my')->name('users.my');
Route::get('/my_success', 'UserExtraController@my_success')->name('users.my_success');
Route::post('/users/set_fail', 'UserExtraController@setFail')->name('users.set_fail');
Route::post('/users/set_success', 'UserExtraController@setSuccess')->name('users.set_success');
Route::post('/users/set_wait', 'UserExtraController@setWait')->name('users.set_wait');
Route::post('/users/set_complete', 'UserExtraController@setComplete')->name('users.set_complete');

Route::any('/set_password', 'UserExtraController@setPassword')->name('users.set_password');


// ajax
Route::group(['prefix'=>'ajax'], function() {

    Route::get('people_handle', 'AjaxController@peopleHandle');
    Route::any('companies_handle', 'AjaxController@companiesHandle');
    Route::any('companies_success_handle', 'AjaxController@companiesSuccessHandle');
    Route::any('companies_wait_handle', 'AjaxController@companiesWaitHandle');
    Route::get('personnel_as_user_handle', 'AjaxController@personnelAsUserHandle');

});

