<?php

use AsanaTeacher\Entity\NavigationAppPerm;

class NavigationAppPermsTableSeeder extends Seeder {

	public function run()
	{
		$navigationAppPerms = array();

		foreach (range(1, 3) as $index) {
			$navigationAppPerms[] = array(
					'category_id' => 1,
					'navigation_app_id' => $index,
				);
		}

		foreach ($navigationAppPerms as $navigationAppPerm)
		{
			NavigationAppPerm::create($navigationAppPerm);	
		}
	}

}