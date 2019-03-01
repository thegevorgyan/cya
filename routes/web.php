<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home/add', 'HomeController@add');

Route::get('home/edit/{id}', 'HomeController@edit');

Route::get('/home', 'HomeController@show')->name('home');

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');    
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/stat', 'AdminController@stat')->name('admin.stat');
    Route::get('/stor', 'AdminController@stor')->name('admin.stor');
    Route::get('/cache', 'AdminController@cache')->name('admin.cache');
    Route::delete('/destroy', 'AdminController@destroy')->name('admin/destroy');
});

Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::get('/websites', 'WebsitesController@index')->name('websites');

Route::get('/compare', 'CheckController@compare')->middleware('cors');

Route::get('/check', 'CheckController@check')->middleware('cors');

//Route::post('/storage', 'CheckController@store');


Route::get('/storage', 'CheckController@store')->middleware('cors');


Route::post('store', 'WebsitesController@store');

Route::post('update/{id}', 'WebsitesController@update')->name('update');

Route::post('/destroy', 'WebsitesController@destroy')->name('destroy');

Route::get('/destroy', 'WebsitesController@getDestroy');

//Route::match(['get', 'post'], '/destroy', 'WebsitesController@destroy');
