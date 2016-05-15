<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/',array('as' => 'home','uses' => 'PagesController@home'));
Route::get('about',array('as' => 'about','uses' => 'PagesController@about'));
Route::get('contact',array('as' => 'contact','uses' => 'PagesController@contact'));
Route::get('accounts/login',array('as' => 'getLogin','uses' => 'AccountsController@getLogin'));
Route::post('accounts/login',array('as' => 'postLogin','uses' => 'AccountsController@postLogin'));


Route::get('accounts/logout',array('as' => 'logout','uses' => 'AccountsController@logout'));
Route::get('lookup/donors',array('as' => 'donors.lookup.index','uses' => 'DonorsLookupController@index'));
Route::get('lookup/donors/{id}',array('as' => 'donors.lookup.show','uses' => 'DonorsLookupController@show'));

Route::get('error','PagesController@error');

Route::group(array('before' => 'auth'), function(){
	Route::get('accounts/profile',array('as' => 'getProfile','uses' => 'AccountsController@getProfile'));
	Route::resource('donors','DonorsController');
	Route::get('patients/{id}/seekhelp',array('as' => 'seekhelp','uses' => 'PatientsController@seekhelp'));
	Route::post('patients/{id}/seekhelp',array('as' => 'postSeekhelp','uses' => 'PatientsController@postSeekhelp'));
	Route::resource('patients','PatientsController');
	Route::get('accounts/changepassword',array('as' => 'getChangepassword','uses' => 'AccountsController@getChangepassword'));
	Route::post('accounts/changepassword',array('as' => 'postChangepassword','uses' => 'AccountsController@postChangepassword'));
});

Route::get('testNotificationEmail',function(){
	$blood_group = 'A+';
	$name = 'Raj Abishek';
	return View::make('emails.donors.urgency',compact('blood_group','name'));
});

Route::get('testWelcomeEmail',function(){
	$name = 'Raj Abishek';
	return View::make('emails.donors.welcome',compact('name'));
});

Event::listen('Acme.*', 'Acme\Listeners\EmailNotifier');
