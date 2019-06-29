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

	Route::get('/withdraws','AdminController@showWithdraw')->name('admin.withdraws');
	Route::post('/withdraw/status','AdminController@changeWithdrawStatus')->name('admin.withdraw.status');

	Route::get('/contacts','AdminController@showContactForm')->name('admin.contacts');



});

// User ROUTES
Route::get('/','UserController@contests')->name('user');
Route::get('/contest/{id}','UserController@contest');
Route::get('/userlogin','UserController@userLogin');

Route::get('join/contest/{id}','UserController@joinContest')->name('join.contest');


Route::get('/redirect', 'Auth\LoginController@redirectToProvider');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/menu','UserController@showMenu')->name('show.menu');

Route::get('/profile','UserController@showUserProfile')->name('show.profile')->middleware(['auth']);
Route::post('/profile','UserController@updateUserProfile')->name('user.profile.update')->middleware(['auth']);

Route::get('/contact','UserController@showContact')->name('user.contact');
Route::post('/contact','UserController@createContact')->name('user.contact.create');

Route::get('privacy-policy','UserController@showPrivacyPolicy')->name('privacy.policy');
Route::get('terms-of-use','UserController@showTermsOfUse')->name('terms.of.use');

Route::get('about-us','UserController@showAboutUs')->name('about.us');

Route::get('withdraw','UserController@withdrawRequest')->name('withdraw')->middleware(['auth']);
Route::post('withdraw/create','UserController@createWithdrawRequest')->name('withdraw.create')->middleware(['auth']);

Route::get('userLogin','UserController@notLoginPage')->name('user.not.login');


