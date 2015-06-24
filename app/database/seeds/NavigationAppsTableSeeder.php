<?php

use AsanaTeacher\Entity\NavigationApp;

class NavigationAppsTableSeeder extends Seeder {

	public function run()
	{

		$navigationApps = array(
				array(
					"app_id"    => 4,
					"title" => "Home",
					"url"   => "app/dashboard",
					"icon"  => "fa-home",
				),
				array(
					"app_id"    => 5,
					"title" => "Test",
					"url"   => "app/test",
					"icon"  => "fa-bomb",
					"parent" => "default"
				),
				array(
					"app_id"    => 6,
					"title" => "UPICSA",
					"url"   => "app/upiicsa",
					"icon"  => "fa-automobile",
					"parent" => "default"
				)
			);

		foreach($navigationApps as $navigationApp)
			NavigationApp::create($navigationApp);
	}

}