<?php

use AsanaTeacher\Entity\NavigationAppPerm;

class NavigationAppPermsTableSeeder extends Seeder {

	public function run()
	{
		$navigationAppPerms = array();

		foreach (range(1, 5) as $index) {
			$navigationAppPerms[] = array(
					'category_id' => 1,
					'navigation_app_id' => $index,
				);
		}

		foreach (array(1, 5) as $index) {
			$navigationAppPerms[] = array(
					'category_id' => 2,
					'navigation_app_id' => $index,
				);
		}

		foreach (array(1, 5) as $index) {
			$navigationAppPerms[] = array(
					'category_id' => 3,
					'navigation_app_id' => $index,
				);
		}

		foreach ($navigationAppPerms as $navigationAppPerm)
		{
			NavigationAppPerm::create($navigationAppPerm);	
		}
	}

}