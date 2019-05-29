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

Route::get('/faculties/{id}', 'HomeController@getDepartments');

//student routes
Route::group(['middleware'=>['auth', 'student']], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'HomeController@profile')->name('profile');
    Route::post('/profile', 'HomeController@saveProfile')->name('profile.create');

    Route::get('api/clearance/faculty/{id}', 'ClearanceController@checkFacultyStatus');
    Route::get('api/clearance/department/{id}', 'ClearanceController@checkDepartmentStatus');
    Route::post('api/clearance/faculty/{id}', 'ClearanceController@updateFacultyClearance');
    Route::post('api/clearance/department/{id}', 'ClearanceController@updateDepartmentClearance');
    
});

Route::group(['middleware'=>['auth', 'department']], function(){
    Route::get('/department', 'DepartmentController@index')->name('department.home');
    Route::get('/department/reports', 'DepartmentController@reports')->name('department.reports');
});



//admin routes
Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'admin']], function(){
    Route::get('/', 'Admin\HomeController@index')->name('admin.home');
    Route::get('/faculty', 'Admin\AccountsController@faculty')->name('admin.faculty');
    Route::post('/faculty', 'Admin\AccountsController@addFaculty')->name('admin.add-faculty');
    Route::get('/accounts', 'Admin\AccountsController@index')->name('admin.accounts');

    Route::post('/accounts', 'Admin\AccountsController@storeAccount')->name('admin.account.store');
    Route::get('/accounts/create', 'Admin\AccountsController@create')->name('admin.accounts.create');

    Route::get('/departments', 'Admin\AccountsController@department')->name('admin.department');
    Route::post('/departments', 'Admin\AccountsController@storeDepartment')->name('admin.store-department');
    Route::get('/departments/create', 'Admin\AccountsController@addDepartment')->name('admin.department.create');

    //admin.store-department 
});
