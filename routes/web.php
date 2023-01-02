<?php
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\Auth\AuthController;


Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin', 'AdminController@index')->name('');

Route::resource('admin/user', 'UserController');
Route::put('admin/user/approve/{id}', 'UserController@status');


Route::resource('admin/routine','RoutineController');

Route::resource('admin/teacher','TeacherController');

Route::get('admin/counselling/routine', 'CounsellingRoutineController@index');
Route::get('admin/counselling/routine/{initial}', 'CounsellingRoutineController@view');

Route::get('admin/counselling/request', 'CounsellingRequestController@all');
Route::put('admin/counselling/request/approve/{id}', 'CounsellingRequestController@status');


Route::get('admin/counselling', 'CounsellingController@index');
//Route::get('admin/counselling/create', 'CounsellingController@add');
Route::get('admin/counselling/{initial}', 'CounsellingController@view');
Route::get('admin/counselling/show/{id}', 'CounsellingController@show');
Route::get('admin/counselling/add', 'CounsellingController@add');
Route::post('admin/counselling/registration', 'CounsellingController@insert');


Route::resource('admin/requestCounselling','RequestCounsellingController');


Route::resource('admin/alluser','MessageController');
Route::get('admin/alluser/send/{id}', 'MessageController@view');
Route::get('admin/allMessage', 'MessageController@allMessage');
// Route::get('admin/allMessage/{id}', 'MessageController@allMessageView');

Route::get('admin/allStudent', 'MessageController@allStudent');
Route::get('admin/teacherMessage/{id}', 'MessageController@viewTeacher');
Route::post('admin/teacherMessage/send', 'MessageController@sendTeacher');

Route::get('admin/allTeacher', 'MessageController@allTeacher');
Route::get('admin/studentMessage/{id}', 'MessageController@viewStudent');
Route::post('admin/studentMessage/send', 'MessageController@sendStudent');


Route::resource('admin/file','FileController');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
