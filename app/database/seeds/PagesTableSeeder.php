<?php

use AsanaTeacher\Entity\Page;

class PagesTableSeeder extends Seeder {

	public function run()
	{
		$pages = array(
			array(
				'route_name'   => 'login',
				'title' => 'Inicio de sesión',
				'description' => 'Inicio de sesión de AsanaTeacher',
				'app_id' => 1,
			),
			array(
				'route_name' => 'sign-up',
				'title' => 'Cuenta AsanaTeacher',
				'description' => 'Creación cuenta en AsanaTeacher',
				'app_id' => 2,
			),
			array(
				'route_name' => 'reset-password',
				'title' => 'Volver a tu cuenta',
				'description' => 'Recupera tu cuenta en AsanaTeacher',
				'app_id' => 3,
			),
			array(
				'route_name' => 'dashboard',
				'title' => 'Asana Teacher',
				'description' => 'Dashboard de usuarios de asana teacher',
			)
		);

		foreach ($pages as $page)
			Page::create($page);
	}

}
