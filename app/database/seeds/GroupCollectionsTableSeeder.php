<?php

use AsanaTeacher\Entity\GroupCollection;

class GroupCollectionsTableSeeder extends Seeder {

	public function run()
	{
		$groupCollections = array(
			array(
				'group_id'   => 2, // grupo
				'teacher_id' => 2, // profesor
				'course_id'  => 1  // curso
			),
			array(
				'group_id'   => 4,
				'teacher_id' => 5,
				'course_id'  => 4
			),
			array(
				'group_id'   => 5,
				'teacher_id' => 6,
				'course_id'  => 5
			),
			array(
				'group_id'   => 6,
				'teacher_id' => 7,
				'course_id'  => 6
			),
		);

		foreach($groupCollections as $groupCollection)
			GroupCollection::create($groupCollection);
	}

}