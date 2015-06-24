<?php

use AsanaTeacher\Entity\GroupCollection;

class GroupCollectionsTableSeeder extends Seeder {

	public function run()
	{
		$groupCollections = array(
			array(
				'group_id'   => 2,
				'teacher_id' => 2,
				'course_id'  => 1
			)
		);

		foreach($groupCollections as $groupCollection)
			GroupCollection::create($groupCollection);
	}

}