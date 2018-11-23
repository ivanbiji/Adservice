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

Route::post('/alogout', 'AdminController@logout')->name('alogout');
Route::get('/alogout', 'Auth\AdminLoginController@showLoginForm')->name('alogout');

Route::prefix('home')->group(function () {

    Route::get('/profile', 'HomeController@show_user')->name('home.profile');;
    Route::get('/user/{id}', 'HomeController@filter_user');
    Route::get('/{id}', 'HomeController@filter_cat');
    Route::get('/', 'HomeController@index')->name('home');
});

Route::prefix('user')->group(function () {

    Route::post('/delete', 'useroperations@deleteu')->name('user.delete');
    Route::post('/search', 'useroperations@searchu')->name('user.search');
    Route::get('/view/{id}', 'useroperations@viewu')->name('user.add');
    Route::get('/', 'useroperations@index')->name('user');

});


Route::prefix('admin')->group(function () {

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/{id}', 'AdminController@filter_cat');
    Route::get('/view/{id}', 'AdminController@filter_user');
    Route::get('/', 'AdminController@index')->name('admin');

});

Route::prefix('adadmin')->group(function () {

    Route::post('/delete', 'adadminoperations@deletead')->name('adadmin.delete');
    Route::post('/search', 'adadminoperations@searchad')->name('adadmin.search');
    Route::get('/search', 'AdminController@index')->name('adadmin.search');
    Route::get('/view/{id}', 'adadminoperations@viewad')->name('adadmin.add');
    Route::get('/', 'AdminController@index')->name('adadmin');

});

Route::prefix('wish')->group(function () {

    Route::post('/delete', 'wishop@deletewish')->name('wish.delete');
    Route::get('/delete', 'adoperations@index')->name('ad.delete');
    Route::get('/add', 'adoperations@addform')->name('ad.add');
    Route::post('/add', 'wishop@addwish')->name('wish.add');
    Route::get('/', 'HomeController@show_user')->name('wish');

});


Route::prefix('ad')->group(function () {

    Route::post('/delete', 'adoperations@deletead')->name('ad.delete');
    Route::get('/delete', 'adoperations@index')->name('ad.delete');
    Route::get('/search', 'HomeController@index')->name('ad.search');
    Route::post('/search', 'adoperations@searchad')->name('ad.search');
    Route::get('/view/{id}', 'adoperations@viewad')->name('ad.add');
    Route::get('/add', 'adoperations@addform')->name('ad.add');
    Route::post('/add', 'adoperations@submitform')->name('ad.add');
    Route::get('/', 'adoperations@addform')->name('ad');

});

Route::get('/', 'homeview@index');
