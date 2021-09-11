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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'WebsiteController@index')->name('');
Route::get('/professor', 'WebsiteController@element')->name('');
Route::get('/about', 'WebsiteController@article')->name('');
Route::get('/contact', 'WebsiteController@contact')->name('');
Route::get('/teacher', 'WebsiteController@allTeacher')->name('');
Route::get('/single_professor/{id}', 'WebsiteController@single')->name('');

//feedback part
Route::post('feedback-page-send', 'FeedBackController@addFeedBack')->name('');


//search
Route::get('search-teacher', 'WebsiteController@search');
// Request Teacher Routes
Route::post('/request-teacher-page-send', 'WebsiteController@addTeacher')->name('');

//vip student
Route::get('/student/login', 'LearnController@viplogin')->name('student.login');
Route::get('/student/signup', 'LearnController@vipsinup')->name('student.sinsup');
Route::post('/student/signup-store', 'LearnController@storesinup')->name('');
Route::get('/email-verify', 'LearnController@emailverify')->name('email.verify');
Route::post('/verify-store', 'LearnController@verifystore')->name('verify.store');
Route::post('/contact-page-send', 'WebsiteController@addContact')->name('');

Auth::routes();
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard', 'AdminController@index')->name('dashboard');

    Route::resource('recycle/user', 'RecycleUserController');

    //user controller
    Route::get('get-users', 'UserController@index');
    Route::match(['get', 'post'], 'get-user-added/{id?}', 'UserController@add');
    Route::delete('user-delete/{id}', 'UserController@destroy');
    // Contact messages routes
    Route::get('contacts', 'ContactController@index')->name('');
    Route::get('contacts/{id}', 'ContactController@show')->name('');
    // Route::get('contacts/{mark}','ContactController@mark')->name('');
    Route::delete('contacts/{id}', 'ContactController@destroy')->name('');
    Route::get('pending', 'ContactController@pending')->name('admin.pending');

    // Request Teacher routes
    Route::get('requestteacher', 'RequestteacherController@index')->name('');
    Route::get('requestteacher/{id}', 'RequestteacherController@show')->name('');
    Route::delete('requestteacher/{id}', 'RequestteacherController@destroy')->name('');

    // Feedback messages routes
    Route::get('feedbacks', 'FeedBackController@index')->name('');
    Route::get('feedback/{id}', 'FeedBackController@show')->name('');
    Route::delete('feedbacks/{id}', 'FeedBackController@destroy')->name('');
    Route::get('pending', 'FeedBackController@pending')->name('admin.pending');

    Route::get('/filed/{id}', 'ContactController@shown')->name('');
    Route::get('/download/{file}', 'ContactController@download')->name('');

    //Role controller
    Route::get('get-role', 'RoleController@index')->name('');
    Route::get('get-role-post-delete', 'RoleController@delete')->name('');
    Route::match(['get', 'post'], 'get-role-post-added/{id?}', 'RoleController@addedit');

    //Department part
    Route::get('get-department', 'DepartmentController@index')->name('');
    Route::delete('get-role-department-delete/{id}', 'DepartmentController@delete');
    Route::match(['get', 'post'], 'get-role-department-added/{id?}', 'DepartmentController@addEdit');

    //School part Start
    Route::get('get-school', 'SchoolController@index')->name('');
    Route::delete('get-role-school-delete/{id}', 'SchoolController@delete');
    Route::match(['get', 'post'], 'get-role-school-added/{id?}', 'SchoolController@addEdit');

    //Site Setting part Start
    Route::get('get-sitesetting', 'SiteSettingController@index')->name('');
    Route::delete('get-role-sitesetting-delete/{id}', 'SiteSettingController@delete');
    Route::match(['get', 'post'], 'get-role-sitesetting-added/{id?}', 'SiteSettingController@addEdit');


    //Teacher part Start
    Route::get('get-teacher', 'TeacherController@index');
    Route::delete('get-role-teacher-delete/{id}', 'TeacherController@delete');
    Route::match(['get', 'post'], 'get-role-teacher-added/{id?}', 'TeacherController@addEdit');


    //status update
    Route::get('subscriber-status/{id}/{status}', 'ContactController@statusUpdate');

    //student info
    Route::get('student', 'StudentController@index')->name('');
    Route::get('student/{id}', 'StudentController@show')->name('');
    Route::delete('student/{id}', 'StudentController@destroy')->name('');
});
Route::group(['as' => 'vc.', 'prefix' => 'vc', 'namespace' => 'VC', 'middleware' => ['auth', 'vc']], function () {
    Route::get('dashboard', 'VCController@index')->name('dashboard');
});



Route::group(['as' => 'student.', 'prefix' => 'student', 'namespace' => 'Student', 'middleware' => ['auth', 'student']], function () {
    Route::get('dashboard', 'StudentController@index')->name('dashboard');
    Route::get('student-edit-pro', 'StudentController@editpro')->name('edit.profile');
    Route::get('/student-index', 'FileController@index')->name('student.index');
    Route::get('student-create', 'FileController@create')->name('');
    Route::get('/filed/{id}', 'FileController@show')->name('');
    Route::get('/download/{file}', 'FileController@download')->name('');
    Route::post('/student-store', 'FileController@storefile')->name('');
    Route::post('/student-edit-profile', 'StudentController@editprostore')->name('student.edit.profile');
    Route::get('/student-password-change', 'StudentController@passwordChange')->name('student.password.change');
    Route::post('/student-password-update', 'StudentController@passwordStore')->name('student.password.update');

    //Route::get('/student-send-file-create','StudentController@filecreate')->name('');
});

Route::get('/home', 'HomeController@index')->name('home');


//Admin layout data  compact
// View::composer('*', function ($view) {

//     // $unreadedMessages = App\JernalSend::unreaded()->count();
//     // $contactMessages = App\JernalSend::latest()->get();
//     // $view->with('unreadedMessages', $unreadedMessages);
//     // $view->with('contactMessages', $contactMessages);
//     $view->with('jernals');
// });
