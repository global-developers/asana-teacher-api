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

Route::get('/', function() use($app)
{

	return User::withAll();

	return View::make('hello');
});

/*
|--------------------------------------------------------------------------
| USERS RESTful RESOURCE CONTROLLER
|--------------------------------------------------------------------------
 */

Route::resource('user', 'UserController');