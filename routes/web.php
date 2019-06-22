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
// 	return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test','HomeController@test');

// ADMIN ROUTES
Route::prefix('admin')->group(function () {

	Route::get('/home','AdminController@index')->name('admin.home');
	Route::get('/contest/new','AdminController@newContest')->name('admin.contest.new');
	Route::post('contest/create','AdminController@createContest');
	Route::get('/contests','AdminController@contests')->name('admin.contests');
	Route::get('/contest/{id}','AdminController@contest')->name('admin.contest');
	Route::get('/contest/edit/{id}','AdminController@editContest');
	Route::post('/contest/update','AdminController@updateContest');
	Route::get('/contest/delete/{id}','AdminController@deleteContest');
	Route::get('/contest/close/{id}','AdminController@closeContest');
	Route::post('/contest/close/{id}','AdminController@closingContest')->name('admin.contest.close');
	Route::post('/contest/live/{id}','AdminController@liveContest')->name('admin.contest.live');
	Route::post('/contest/{id}/player/update','AdminController@updatePlayer')->name('admin.contest.player.update');
	Route::post('/contest/player/pay','AdminController@payPlayerPrize')->name('admin.contest.player.pay');
	Route::post('/contest/room/update','AdminController@updateRoom')->name('admin.contest.room.update');

	Route::get('/players','AdminController@players')->name('admin.players');
	Route::get('/player/{id}','AdminController@player')->name('admin.player');


});

// User ROUTES
Route::get('/','UserController@contests')->name('user');
Route::get('/contest/{id}','UserController@contest');
Route::get('/userlogin','UserController@userLogin');

Route::get('join/contest/{id}','UserController@joinContest')->name('join.contest');

// Testing
Route::get('/testing','AdminController@testing');

Route::get('/redirect', 'Auth\LoginController@redirectToProvider');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/menu','UserController@showMenu')->name('show.menu');
Route::get('/profile','UserController@showProfile')->name('show.profile');

Route::get('privacy-policy','UserController@showPrivacyPolicy')->name('privacy.policy');
Route::get('terms-of-use','UserController@showTermsOfUse')->name('terms.of.use');

Route::get('withdraw','UserController@withdrawRequest')->name('withdraw');
Route::post('withdraw/create','UserController@createWithdrawRequest')->name('withdraw.create');


