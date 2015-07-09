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
| LInfo Proyect
|--------------------------------------------------------------------------
*/

/*
 | linfo/json/{name} route
 */
Route::get('linfo/json/{name}', ['as' => 'linfo-json', 'uses' => 'LinfoController@json']);

/*
 | linfo/widget/{name} route
 */
Route::get('linfo/widget/{name}', ['as' => 'linfo-widget', 'uses' => 'LinfoController@widget']);

/*
|--------------------------------------------------------------------------
| VIEWS RESTFUL RESOURCE CONTROLLER
|--------------------------------------------------------------------------
*/

Route::group(array('prefix' => 'app'), function() {
	
	Route::get('profile/{id?}', ['as' => 'app.profile', 'uses' => 'ProfileViewController@index']);
	Route::get('calendar', ['as' => 'app.calendar', 'uses' => 'CalendarViewController@index']);

	Route::group(array('prefix' => 'admin'), function() {
		Route::get('users', ['as' => 'app.admin.users', 'uses' => 'UserViewController@index']);
		Route::get('dashboard', ['as' => 'app.admin.dashboard', 'uses' => 'DashboardViewController@index']);
	});

});
