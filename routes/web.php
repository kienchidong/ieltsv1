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
Route::get('landing', function (){
    return view('landingpage');
});

Auth::routes();

Route::prefix('admin')->group(function () {
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
    Route::prefix('/')->middleware('auth:admin')->group(function () {
        /*
         * trang chủ admin
         * */
        Route::get('/', 'Auth\Admin\HomeAdminController@index')->name('admin.index');
        /*
     * Form mẫu
     */
        Route::prefix('form')->group(function () {

            Route::get('index', 'Admins\FormController@index')->name('form.index');
            Route::get('create', 'Admins\FormController@create')->name('form.add');
        });
        Route::prefix('slider')->group(function () {
            Route::get('/list', 'Admins\SliderController@index')->name('slider.index');
            Route::get('/add', 'Admins\SliderController@create')->name('slider.create');
            Route::post('/add', 'Admins\SliderController@store')->name('slider.store');

            Route::get('/edit/{id}', 'Admins\SliderController@edit')->name('slider.edit');
            Route::post('/edit/{id}', 'Admins\SliderController@update')->name('slider.update');
            Route::get('/destroy/{id}', 'Admins\SliderController@destroy')->name('slider.destroy');

            Route::get('/setactive/{id}/{status}', 'Admins\SliderController@setactive')->name('slider.setactive');

        });

    });


});
Route::get('test', 'test@index');
Route::get('/' , function(){
    return view('pages.trangchu');
});
Route::get('/course',function(){
    return view('pages.course');
});
Route::get('/dangky',function(){
    return view('pages.dangky');
});
Route::get('/thuvien',function(){
    return view('pages.thuvien');
});

Route::get('/blog',function(){
    return view('pages.blog');
});

Route::get('/blog-detai',function(){
    return view('pages.blog-detai');
});
