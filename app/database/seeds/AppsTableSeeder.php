<?php

use AsanaTeacher\Entity\App;

class AppsTableSeeder extends Seeder {

	public function run()
	{
		$apps = array(
			array(
				'name' => 'login',
				'layout' => 'layouts.apps.login',
				'description' => 'Login of the application.'
			),
			array(
				'name' => 'sign-up',
				'layout' => 'layouts.apps.sign-up',
				'description' => 'Register of the application.'
			),
			array(
				'name' => 'reset-password',
				'layout' => 'layouts.apps.reset-password',
				'description' => 'Reset password of the application.'
			),
			array(
				'name' => 'profile',
				'layout' => 'layouts.apps.profile',
				'description' => 'Profile page of this user.',
			),
			array(
				'name' => 'administrar',
				'layout' => null,
				'description' => 'Item of admin.',
			),
			array(
				'name' => 'dashboard',
				'layout' => 'layouts.apps.admin.dashboard',
				'description' => 'Dashboard of this server.',
			),
			array(
				'name' => 'users',
				'layout' => 'layouts.apps.admin.users',
				'description' => 'User registers in this application.',
			),
			array(
				'name' => 'calendar',
				'layout' => 'layouts.apps.calendar',
				'description' => 'Calendar of user.',
			),
		);

		foreach ($apps as $app) {
			App::create($app);
		}
	}

}