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
//Route::get('/map/getPOIS', 'MapController@getPOIS')->name('map/getPOIS');
Route::get('/map/marker/{id}', 'MapController@retrieveMarkerInfo')->name('map/marker');

Route::post('/login/request', 'Auth\LoginController@loginRequest')->name('login/request');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


/*
 * Below routes are for admin users
 * - Uses Admin middleware
 * - Uses controllers inside Admin folder
 * - uses admin/ as part of URL
 * - uses admin folder of views
 */

Route::middleware(['auth', 'admin'])->namespace('Admin')->prefix('admin')->name('admin/')->group(function () {

	//Dashboard
	Route::get('dashboard', 'DashboardController@index')->name('dashboard');

	//Users
	Route::get('users', 'UserController@index')->name('users');
	Route::get('users/create', 'UserController@create')->name('users/create');
	Route::post('users/create', 'UserController@store')->name('users/create');
	Route::get('users/edit/{id}', 'UserController@edit')->name('users/edit');
	Route::post('users/edit/{id}', 'UserController@update')->name('users/edit');
	Route::get('users/visibility/{id}', 'UserController@show')->name('users/visibility');
	Route::get('users/delete/{id}', 'UserController@destroy')->name('users/delete');

	//Department
    Route::get('department', 'DepartmentController@index')->name('department');
    Route::get('department/create', 'DepartmentController@create')->name('department/create');
    Route::post('department/create', 'DepartmentController@store')->name('department/create');
    Route::get('department/edit/{id}', 'DepartmentController@edit')->name('department/edit');
	Route::post('department/edit/{id}', 'DepartmentController@update')->name('department/edit');
	Route::get('department/visibility/{id}', 'DepartmentController@show')->name('department/visibility');
	Route::get('department/delete/{id}', 'DepartmentController@destroy')->name('department/delete');

	//Settings
	Route::get('settings', 'SettingsController@index')->name('settings');

});

/*
 * Below routes are for teacher users
 * - Uses Teacher middleware
 * - Uses controllers inside Teacher folder
 * - uses teacher/ as part of URL
 * - uses teacher folder of views
 */

Route::middleware(['auth', 'teacher'])->namespace('Teacher')->prefix('teacher')->name('teacher/')->group(function () {

	//Dashboard
	Route::get('dashboard', 'DashboardController@index')->name('dashboard');

	//Exercise
	Route::get('exercise', 'ExerciseController@index')->name('exercise');
	Route::get('exercise/create', 'ExerciseController@create')->name('exercise/create');
    Route::post('exercise/create', 'ExerciseController@store')->name('exercise/create');
    Route::get('exercise/edit/{id}', 'ExerciseController@edit')->name('exercise/edit');
	Route::post('exercise/edit/{id}', 'ExerciseController@update')->name('exercise/edit');
	Route::get('exercise/visibility/{id}', 'ExerciseController@show')->name('exercise/visibility');
	Route::get('exercise/delete/{id}', 'ExerciseController@destroy')->name('exercise/delete');
	
	//POI
	Route::get('poi', 'PoiController@index')->name('poi');
	Route::get('poi/create', 'PoiController@create')->name('poi/create');
	Route::post('poi/create', 'PoiController@store')->name('poi/create');
	Route::get('poi/edit/{id}', 'PoiController@edit')->name('poi/edit');
	Route::post('poi/edit/{id}', 'PoiController@update')->name('poi/edit');
	Route::get('poi/visibility/{id}', 'PoiController@show')->name('poi/visibility');
	Route::get('poi/delete/{id}', 'PoiController@destroy')->name('poi/delete');

	//Routes
	Route::get('route', 'RouteController@index')->name('route');
	Route::get('route/create', 'RouteController@create')->name('route/create');
	Route::post('route/create', 'RouteController@store')->name('route/create');
	Route::get('route/edit/{id}', 'RouteController@edit')->name('route/edit');
	Route::post('route/edit/{id}', 'RouteController@update')->name('route/edit');
	Route::get('route/visibility/{id}', 'RouteController@show')->name('route/visibility');
	Route::get('route/delete/{id}', 'RouteController@destroy')->name('route/delete');

	//Students
	Route::get('student', 'StudentController@index')->name('student');
	Route::get('student/create', 'StudentController@create')->name('student/create');
    Route::post('student/create', 'StudentController@store')->name('student/create');
    Route::get('student/edit/{id}', 'StudentController@edit')->name('student/edit');
	Route::post('student/edit/{id}', 'StudentController@update')->name('student/edit');
	Route::get('student/visibility/{id}', 'StudentController@show')->name('student/visibility');
	Route::get('student/delete/{id}', 'StudentController@destroy')->name('student/delete');

	//Groups
	Route::get('group', 'GroupController@index')->name('group');
	Route::get('group/create', 'GroupController@create')->name('group/create');
    Route::post('group/create', 'GroupController@store')->name('group/create');
    Route::get('group/edit/{id}', 'GroupController@edit')->name('group/edit');
	Route::post('group/edit/{id}', 'GroupController@update')->name('group/edit');
	Route::get('group/visibility/{id}', 'GroupController@show')->name('group/visibility');
	Route::get('group/delete/{id}', 'GroupController@destroy')->name('group/delete');

	//Settings
	Route::get('settings', 'SettingsController@index')->name('settings');
	Route::post('settings', 'SettingsController@update')->name('settings');

});
