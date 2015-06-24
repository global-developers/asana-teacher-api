<?php

/*
|--------------------------------------------------------------------------
| APPLICATION ROUTES
|--------------------------------------------------------------------------|
*/

/*
 |--------------------------------------------------------------------------
 | GUEST PUBLIC GROUP ROUTES
 |--------------------------------------------------------------------------
 */
Route::group(array('before' => array('guest')), function(){
	
	/*
	 | login route
	 */
	Route::get('login', ['as' => 'login', 'uses' => 'SessionController@index']);
	/*
	 | sing-up route
	 */
	Route::get('sign-up', ['as' => 'sign-up', 'uses' => 'SessionController@signUp']);
	/*
	 | reset-password route
	 */
	Route::get('reset-password', ['as' => 'reset-password', 'uses' => 'SessionController@passwordReset']);

	/*
	 | CSRF security group
	 */
	Route::group(array('before' => 'csrf'), function(){
	
		/*
		 | sign-in route 
		 */
		Route::post('login', ['as' => 'sign-in', 'uses' => 'SessionController@login']);
		/*
		 | forgot route
		 */
		Route::post('forgot', ['as' => 'forgot', 'uses' => 'SessionController@forgot']);
	
	});

});

/*
 |--------------------------------------------------------------------------
 | AUTH PRIVATE GROUP ROUTES
 |--------------------------------------------------------------------------
 */
Route::group(['before' => 'auth'], function(){
	/*
	 | logout route
	 */
	Route::get('logout', ['as' => 'logout', 'uses' => 'SessionController@logout']);

	Route::get('/', ['as' => 'dashboard', 'uses' => 'AsanaTeacherController@index']);
});

/*
|--------------------------------------------------------------------------
| USERS RESTFUL RESOURCE CONTROLLER
|--------------------------------------------------------------------------
*/

Route::group(array('prefix' => 'api'), function(){
	Route::resource('users', 'UserController');
	Route::resource('categories', 'CategoryController');
	/*
	 | photo route
	 */
	Route::get('users/{id}/photo', ['as' => 'users.photo', 'uses' => 'UserController@photo']);
});

/*
|--------------------------------------------------------------------------
| VIEWS RESTFUL RESOURCE CONTROLLER
|--------------------------------------------------------------------------
*/
use AsanaTeacher\Entity\App;
Route::get('app/{name}', function($name) {

	$layout = App::where('name', $name)->lists('layout');

	$layout = isset($layout[0]) ? $layout[0] : 'layouts.apps.default';

	return View::make($layout);
});
