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
				'name' => 'default',
				'description' => 'Simple admin page.',
			),
			array(
				'name' => 'default-two',
				'description' => 'Simple admin page.',
			),
			array(
				'name' => 'default-three',
				'description' => 'Simple admin page.',
			)
		);

		foreach ($apps as $app) {
			App::create($app);
		}
	}

}