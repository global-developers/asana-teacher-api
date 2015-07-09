<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use AsanaTeacher\Entity\JoinGroupCollection;

class JoinGroupCollectionsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$joinGroupCollections = array(
				array(
					'group_collection_id' => 1,
					'student_id'          => 1,
				),
				array(
					'group_collection_id' => 2,
					'student_id'          => 1,
				),
				array(
					'group_collection_id' => 3,
					'student_id'          => 1,
				),
			);

		foreach($joinGroupCollections as $joinGroupCollection)
			JoinGroupCollection::create($joinGroupCollection);
	}

}