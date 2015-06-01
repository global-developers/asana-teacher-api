<?php

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		$categories = array(
				array(
					'name' => 'admin',
				),
				array(
					'name' => 'student',
				),
				array(
					'name' => 'teacher',
				),
			);

		foreach ($categories as $category)
		{
			Category::create($category);
		}
	}

}