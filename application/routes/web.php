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

Route::get('/',
    function () {
        return view('welcome');
    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/map', 'MapController@index')->name('map');

/*
 * Below routes are for admin users
 * - Uses Admin middleware
 * - Uses controllers inside Admin folder
 * - uses admin/ as part of URL
 * - uses admin folder of views
 */

Route::middleware(['auth', 'admin'])->namespace('Admin')->prefix('admin')->name('admin/')->group(function () {

    Route::get('/users', 'UserController@index')->name('users');

    Route::get('/departments', 'DepartmentController@index')->name('departments');

});

/*
 * Below routes are for teacher users
 * - Uses Teacher middleware
 * - Uses controllers inside Teacher folder
 * - uses teacher/ as part of URL
 * - uses teacher folder of views
 */

Route::namespace('Teacher')->prefix('teacher')->name('teacher/')->group(function () {

	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/poi', 'PoiController@index')->name('poi');

    Route::get('/routes', 'RouteController@index')->name('routes');

    Route::get('/students', 'StudentController@index')->name('students');

    Route::get('/groups', 'GroupController@index')->name('groups');

    Route::get('/settings', 'SettingsController@index')->name('settings');

});