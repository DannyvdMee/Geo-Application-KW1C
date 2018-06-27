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
Route::get('/map/marker/{id}', 'MapController@retrieveMarkerInfo')->name('map/,arler');

Route::post('/login/request', 'Auth\LoginController@loginRequest')->name('login/request');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


/*
 * Below routes are for admin users
 * - Uses Admin middleware
 * - Uses controllers inside Admin folder
 * - uses admin/ as part of URL
 * - uses admin folder of views
 */

Route::namespace('Admin')->prefix('admin')->name('admin/')->group(function () {

	//Dashboard
	Route::get('dashboard', 'DashboardController@index')->name('dashboard');

	//users
	Route::get('users', 'UserController@index')->name('users');

	//department
	Route::get('departments', 'DepartmentController@index')->name('departments');
	Route::post('departments/create', 'DepartmentController@create')->name('departments/create');

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

Route::namespace('Teacher')->prefix('teacher')->name('teacher/')->group(function () {

	//Dashboard
	Route::get('dashboard', 'DashboardController@index')->name('dashboard');

	//Exercise
	Route::get('exercise', 'ExerciseController@index')->name('exercise');
	Route::get('exercise/create', 'ExerciseController@create')->name('exercise/create');
	Route::post('exercise/create', 'ExerciseController@store')->name('exercise/create');
	
	//POI -- Correct en werkend -- kan als template gebruikt worden
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
	Route::get('route/delete/{id}', 'PoiControRouteControllerller@destroy')->name('route/delete');

	//Students
	Route::get('student', 'StudentController@index')->name('student');
	Route::get('student/create', 'StudentController@create')->name('student/create');
	Route::post('student/create', 'StudentController@store')->name('student/create');

	//Groups
	Route::get('group', 'GroupController@index')->name('group');
	Route::get('group/create', 'GroupController@create')->name('group/create');
	Route::post('group/create', 'GroupController@store')->name('group/create');

	//Settings
	Route::get('settings', 'SettingsController@index')->name('settings');

});
