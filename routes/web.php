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

Route::prefix('admin')->group(function (){
    /*
     *middleware Login admin
     * */
    Route::get('loginAdmin.html', 'Auth\Admin\AdminLoginController@index')->name('admin.login');
    Route::post('loginAdmin', 'Auth\Admin\AdminLoginController@login')->name('admin.login.post');

    /*
     * Logout admin
     * */
    Route::get('logoutAdmin', 'Auth\Admin\AdminLoginController@logout')->name('admin.logout');

    /*
     * Admin
     * */
    Route::prefix('/')->middleware('auth:admin')->group(function (){
        /*
         * trang chủ admin
         * */
        Route::get('index.html', 'Auth\Admin\HomeAdminController@index')->name('admin.index');
    });

});
Route::get('test', 'test@index');
