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


//student routes
Route::group(['middleware'=>['auth', 'student']], function(){
    Route::get('/home', 'HomeController@index')->name('home');
});



//admin routes
Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'admin']], function(){
    Route::get('/', 'Admin\HomeController@index')->name('admin.home');
    Route::get('/faculty', 'Admin\AccountsController@faculty')->name('admin.faculty');
    Route::post('/faculty', 'Admin\AccountsController@addFaculty')->name('admin.add-faculty');
    Route::get('/accounts', 'Admin\AccountsController@index')->name('admin.accounts');
    Route::get('/accounts/create', 'Admin\AccountsController@create')->name('admin.accounts.create');

    Route::get('/departments', 'Admin\AccountsController@department')->name('admin.department');
    Route::post('/departments', 'Admin\AccountsController@storeDepartment')->name('admin.store-department');
    Route::get('/departments/create', 'Admin\AccountsController@addDepartment')->name('admin.department.create');

    //admin.store-department 
});
