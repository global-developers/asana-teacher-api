<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('CategoriesTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('AppsTableSeeder');
		$this->call('NavigationAppsTableSeeder');
		$this->call('NavigationAppPermsTableSeeder');
		$this->call('PagesTableSeeder');
		$this->call('CoursesTableSeeder');
		$this->call('DegreesTableSeeder');
		$this->call('GroupsTableSeeder');
		$this->call('GroupCollectionsTableSeeder');
		$this->call('SchedulesTableSeeder');
	}

}
