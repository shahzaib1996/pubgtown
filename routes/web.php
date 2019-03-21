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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test','HomeController@test');

// ADMIN ROUTES
Route::prefix('admin')->group(function () {

	Route::get('/home','AdminController@index')->name('admin.home');
	Route::get('/contest/new','AdminController@newContest')->name('admin.contest.new');
	Route::post('contest/create','AdminController@createContest');
	Route::get('/contests','AdminController@contests')->name('admin.contests');
	Route::get('/contest/{id}','AdminController@contest');
	Route::get('/contest/edit/{id}','AdminController@editContest');
	Route::post('/contest/update','AdminController@updateContest');
	Route::get('/contest/delete/{id}','AdminController@deleteContest');
	Route::get('/contest/close/{id}','AdminController@closeContest');
	Route::post('/contest/close/{id}','AdminController@closingContest')->name('admin.contest.close');
	Route::post('/contest/{id}/player/update','AdminController@updatePlayer')->name('admin.contest.player.update');


});

// User ROUTES
Route::get('/','UserController@contests')->name('user');
Route::get('/contest/{id}','UserController@contest');

// Testing
Route::get('/testing','AdminController@testing');


