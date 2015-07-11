<?php

use AsanaTeacher\Entity\NavigationApp;

class NavigationAppsTableSeeder extends Seeder {

	public function run()
	{

		$navigationApps = array(
				array(
					"app_id" => 4,
					"title"  => "Inicio",
					"url"    => "app/profile",
					"icon"   => "fa-home",
				),
				array(
					"app_id" => 5,
					"title"  => "Administrar",
					"url"    => "app/dashboard",
				),
				array(
					"app_id" => 6,
					"title"  => "Dashboard",
					"url"    => "app/admin/dashboard",
					"icon"   => "fa-dashboard",
					"parent" => "administrar"
				),
				array(
					"app_id" => 7,
					"title"  => "Usuarios",
					"url"    => "app/admin/users",
					"icon"   => "fa-group",
					"parent" => "administrar"
				),
				array(
					"app_id" => 8,
					"title"  => "Calendario",
					"url"    => "app/calendar",
					"icon"   => "fa-calendar"
				),
			);

		foreach($navigationApps as $navigationApp)
			NavigationApp::create($navigationApp);
	}

}