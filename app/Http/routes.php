<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




Route::get('/', function () {
    return view('default.auth.login');
});

Route::group(['namespace' => 'Login','prefix'=>'auth'], function()
{
    Route::get('list', 'AdminController@index');
    Route::get('role', 'LoginController@roleCheck');
    Route::post('signin', 'LoginController@login');
    Route::get('login', 'LoginController@signInForm');
    Route::post('login', 'LoginController@signin');
    Route::get('signout','LoginController@logout');
    Route::get('mypage','LoginController@myPage');

});

Route::group(['namespace' => 'Language'], function()
{
    Route::get('lang/{locale}', 'LanguageController@langChooser');
});
Route::group(['namespace' => 'User','prefix'=>'user'], function()
{
    Route::get('list', 'UsersController@index');
    Route::get('add', 'UsersController@createUserForm');
    Route::post('add', 'UsersController@createUser');
    Route::get('view/{id}', 'UsersController@viewUser');
    Route::get('edit/{id}', 'UsersController@editUserForm');
    Route::patch('edit/{id}', 'UsersController@editUser');
});

Route::group(['namespace' => 'Admin','prefix'=>'admin'], function()
{
    Route::get('/','AdminController@accessAdmin');
    Route::get('list', 'AdminController@index');
    Route::get('add', 'AdminController@createAdminForm');
    Route::post('add', 'AdminController@createAdmin');
});

Route::group(['namespace' => 'Employee','prefix'=>'employee'], function()
{
    Route::get('/','EmployeeController@employeePage');

});

Route::group(['namespace' => 'Common'], function()
{

    Route::get('role/add','CommonController@createForm');
    Route::post('role/add', 'CommonController@createRole');
    Route::get('role/assign','CommonController@roleAssignForm');
    Route::post('role/assign','CommonController@assignRole');

    Route::get('permission/add','CommonController@createForm');
    Route::post('permission/add', 'CommonController@createPermission');
    Route::get('permission/assign','CommonController@permissionAssignForm');
    Route::post('permission/assign','CommonController@assignPermission');

    Route::get('gender/add', 'CommonController@createForm');
    Route::post('gender/add', 'CommonController@createGender');

    Route::get('religion/add', 'CommonController@createForm');
    Route::post('religion/add', 'CommonController@createReligion');

    Route::get('cgroup/add', 'CommonController@createForm');
    Route::post('cgroup/add', 'CommonController@createCgroup');

    Route::get('company/add', 'CommonController@createForm');
    Route::get('department/add', 'CommonController@createForm');

});
