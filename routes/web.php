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

/*Route::get('/gate', function () {
    return view('welcome');
});
Route::get('landing', function (){
    return view('landingpage');
})->name('landing');
Route::get('landing2', function (){
    return view('landingpage2');
})->name('landing2');*/

Auth::routes();
/*
 * Phần giao diện bên ngoài public
 */

//Trang chủ

Route::prefix('/')->group(function () {
    Route::get('/', 'Client\HomeController@index')->name('trang-chu');
    // Chia sẻ
    Route::prefix('chia-se')->group(function () {

        Route::get('/{slug}', 'Client\BlogController@detail')->name('blogs.detail');
        Route::get('/', 'Client\BlogController@index')->name('blogs.index');
    });
    // Thư viện
    Route::prefix('library')->group(function () {

        Route::get('{slug}', 'Client\LibraryController@loaithuvien')->name('loai-thu-vien');
        Route::get('{cate}/{slug}', 'Client\LibraryController@chitietthuvien')->name('chi-tiet-thu-vien');
    });
    //Khóa học
    Route::get('/course', function () {
        return view('pages.course');
    });
    //Liên hệ
    Route::get('/lienhe', function () {
        return view('pages.lienhe');
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
// Route::get('/thuvien',function(){
//     return view('pages.thuvien');
// });
    Route::get('/blog',function(){
        return view('pages.blog');
    })->name('blog');
    Route::get('/blog-detai',function(){
        return view('pages.blog-detai');
    });
    Route::get('/lienhe' , function(){
        return view('pages.lienhe');
    });
    Route::prefix('thuvien')->group(function () {
        Route::get('/nghe', function(){
            return view('pages.reading');
        });
        Route::get('/noi', function(){
            return view('pages.speaking');
        });
        Route::get('/doc', function(){
            return view('pages.reading');
        });
        Route::get('/viet', function(){
            return view('pages.writing');
        });
        Route::get('/total', function(){
            return view('pages.tonghop');
        });
    });
    Route::get('landing', function (){
        return view('landingpage');
    })->name('landing');
});



//Route::prefix('thuvien')->group(function () {
//    Route::get('/nghe', function () {
//        return view('pages.reading');
//    });
//    Route::get('/noi', function () {
//        return view('pages.speaking');
//    });
//    Route::get('/doc', function () {
//        return view('pages.reading');
//    });
//    Route::get('/viet', function () {
//        return view('pages.writing');
//    });
//    Route::get('/total', function () {
//        return view('pages.tonghop');
//    });
//});

/*
 * Admin quản trị
 */

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
        /*
         * Phần slider của trang chủ
         */
        Route::prefix('slider')->group(function () {
            Route::get('/list', 'Admins\SliderController@index')->name('slider.index');
            Route::get('/add', 'Admins\SliderController@create')->name('slider.create');
            Route::post('/add', 'Admins\SliderController@store')->name('slider.store');

            Route::get('/edit/{id}', 'Admins\SliderController@edit')->name('slider.edit');
            Route::post('/edit/{id}', 'Admins\SliderController@update')->name('slider.update');
            Route::get('/destroy/{id}', 'Admins\SliderController@destroy')->name('slider.destroy');

            Route::get('/setactive/{id}/{status}', 'Admins\SliderController@setactive')->name('slider.setactive');

        });
        /*
         * Phần liên hệ trang chủ
         */
        Route::prefix('contact')->group(function () {
            Route::get('/list', 'Admins\ContactController@index')->name('contact.index');
            Route::get('/add', 'Admins\ContactController@create')->name('contact.create');
            Route::post('/add', 'Admins\ContactController@store')->name('contact.store');

            Route::get('/edit/{id}', 'Admins\ContactController@edit')->name('contact.edit');
            Route::post('/edit/{id}', 'Admins\ContactController@update')->name('contact.update');
            Route::get('/destroy/{id}', 'Admins\ContactController@destroy')->name('contact.destroy');

            Route::get('/setactive/{id}/{status}', 'Admins\ContactController@setactive')->name('contact.setactive');

        });
        /*
         * Giảng viên
         */
        Route::prefix('teacher')->group(function () {
            Route::get('/list', 'Admins\TeacherController@index')->name('teacher.index');
            Route::get('/add', 'Admins\TeacherController@create')->name('teacher.create');
            Route::post('/add', 'Admins\TeacherController@store')->name('teacher.store');

            Route::get('/edit/{id}', 'Admins\TeacherController@edit')->name('teacher.edit');
            Route::post('/edit/{id}', 'Admins\TeacherController@update')->name('teacher.update');
            Route::get('/destroy/{id}', 'Admins\TeacherController@destroy')->name('teacher.destroy');

            Route::get('/setactive/{id}/{status}', 'Admins\TeacherController@setactive')->name('teacher.setactive');

        });

        /*
         * Khóa học offline
         */
        Route::prefix('course-offline')->group(function () {
            Route::get('/list', 'Admins\CourseOfflineController@index')->name('course_offline.index');
            Route::get('/add', 'Admins\CourseOfflineController@create')->name('course_offline.create');
            Route::post('/add', 'Admins\CourseOfflineController@store')->name('course_offline.store');

            Route::get('/edit/{id}', 'Admins\CourseOfflineController@edit')->name('course_offline.edit');
            Route::post('/edit/{id}', 'Admins\CourseOfflineController@update')->name('course_offline.update');
            Route::get('/destroy/{id}', 'Admins\CourseOfflineController@destroy')->name('course_offline.destroy');

            Route::get('/setactive/{id}/{status}', 'Admins\CourseOfflineController@setactive')->name('course_offline.setactive');

        });

        /*
         * Thư viện
         */
        Route::prefix('library')->group(function () {
            Route::get('/add-cate', 'Admins\LibraryController@cate_create')->name('cate_library.create');
            Route::post('/add-cate', 'Admins\LibraryController@cate_store')->name('cate_library.store');

            Route::get('/destroy-cate/{id}', 'Admins\LibraryController@cate_destroy')->name('cate_library.destroy');

            Route::get('/setactive-cate/{id}/{status}', 'Admins\LibraryController@cate_setactive')->name('cate_library.setactive');

            Route::get('/list', 'Admins\LibraryController@index')->name('library.index');
            Route::get('/add', 'Admins\LibraryController@create')->name('library.create');
            Route::post('/add', 'Admins\LibraryController@store')->name('library.store');

            Route::get('/edit/{id}', 'Admins\LibraryController@edit')->name('library.edit');
            Route::post('/edit/{id}', 'Admins\LibraryController@update')->name('library.update');
            Route::get('/destroy/{id}', 'Admins\LibraryController@destroy')->name('library.destroy');

            Route::get('/setactive/{id}/{status}', 'Admins\LibraryController@setactive')->name('library.setactive');

        });
        /*
         * Blog
         */
        Route::prefix('blog')->group(function () {
//            Route::get('/add-cate', 'Admins\BlogController@cate_create')->name('cate_blog.create');
//            Route::post('/add-cate', 'Admins\BlogController@cate_store')->name('cate_blog.store');

//            Route::get('/destroy-cate/{id}', 'Admins\BlogController@cate_destroy')->name('cate_blog.destroy');

//            Route::get('/setactive-cate/{id}/{status}', 'Admins\BlogController@cate_setactive')->name('cate_blog.setactive');

            Route::get('/list', 'Admins\BlogController@index')->name('blog.index');
            Route::get('/add', 'Admins\BlogController@create')->name('blog.create');
            Route::post('/add', 'Admins\BlogController@store')->name('blog.store');

            Route::get('/edit/{id}', 'Admins\BlogController@edit')->name('blog.edit');
            Route::post('/edit/{id}', 'Admins\BlogController@update')->name('blog.update');
            Route::get('/destroy/{id}', 'Admins\BlogController@destroy')->name('blog.destroy');

            Route::get('/setactive/{id}/{status}', 'Admins\BlogController@setactive')->name('blog.setactive');

        });

        Route::prefix('introduce')->group(function(){
           /*
            * list
            * */
           Route::get('list.html', 'Admins\IntroduceController@index')->name('introduce.list');


           /*
            * sửa
            * */
           Route::post('update/{id}', 'Admins\IntroduceController@update')->name('introduce.update');
        });
    });
});



Route::get('/dangky', function () {
    return view('pages.dangky');
});



// Route::get('/thuvien',function(){
//     return view('pages.thuvien');
// });

//
//Route::get('/blog', function () {
//    return view('pages.blog');
//});
//
//Route::get('/blog-detai', function () {
//    return view('pages.blog-detai');
//});
