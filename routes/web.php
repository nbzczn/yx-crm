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
Route::get('/my_wait', 'UserExtraController@my_wait')->name('users.my_wait');
Route::get('/payed', 'UserExtraController@payed')->name('users.payed');
Route::post('/users/set_fail', 'UserExtraController@setFail')->name('users.set_fail');
Route::post('/users/set_success', 'UserExtraController@setSuccess')->name('users.set_success');
Route::post('/users/set_wait', 'UserExtraController@setWait')->name('users.set_wait');
Route::post('/users/set_complete', 'UserExtraController@setComplete')->name('users.set_complete');
Route::post('/users/set_payed', 'UserExtraController@setPayed')->name('users.set_payed');

Route::any('/set_password', 'UserExtraController@setPassword')->name('users.set_password');
Route::any('/clear_all', 'ClearAllController')->name('clear_all');
Route::any('/admin_success', 'AdminDateController@success')->name('admin.admin_success');

Route::get('/all_payed', 'AdminDateController@allPayed')->name('admin.all_payed');


// ajax
Route::group(['prefix'=>'ajax'], function() {

    Route::get('people_handle', 'AjaxController@peopleHandle');
    Route::any('companies_handle', 'AjaxController@companiesHandle');
    Route::any('companies_success_handle', 'AjaxController@companiesSuccessHandle');
    Route::any('companies_payed_handle', 'AjaxController@companiesPayedHandle');
    Route::any('companies_wait_handle', 'AjaxController@companiesWaitHandle');
    Route::any('companies_all_payed_handle', 'AjaxController@companiesAllPayedHandle');
    Route::get('personnel_as_user_handle', 'AjaxController@personnelAsUserHandle');

});

