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

/*
 * Below routes are for admin users
 * - Uses Admin middleware
 * - Uses controllers inside Admin folder
 * - uses admin/ as part of URL
 * - uses admin folder of views
 */

Route::namespace('Admin')->prefix('admin')->name('admin/')->group(function () {

    Route::get('users', 'UserController@index')->name('users');

	Route::get('departments', 'DepartmentController@index')->name('departments');
	Route::get('departments/create', 'DepartmentController@create')->name('departments/create');

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

    //POI
    Route::get('poi', 'PoiController@index')->name('poi');
    Route::get('poi/create', 'PoiController@create')->name('poi/create');
    Route::post('poi/create', 'PoiController@store')->name('poi/create');
    Route::get('poi/edit/{id}', 'PoiController@edit')->name('poi/edit');
    Route::post('poi/edit/{id}', 'PoiController@update')->name('poi/edit');
    Route::get('poi/visibility/{id}', 'PoiController@show')->name('poi/visibility');
    Route::get('poi/delete/{id}', 'PoiController@destroy')->name('poi/delete');

    //Routes
    Route::get('routes', 'RouteController@index')->name('routes');

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