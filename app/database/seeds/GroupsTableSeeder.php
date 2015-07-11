<?php

use AsanaTeacher\Entity\Group;

class GroupsTableSeeder extends Seeder {

	public function run()
	{
		$groups = array(
			array(
				'name' => '1CM20'
			),
			array(
				'name' => '1CM22' // ya
			),
			array(
				'name' => '1CM30'
			),
			array(
				'name' => '2CM32' // ya
			),
			array(
				'name' => '2CV32' // ya
			),
			array(
				'name' => '2CV40' // ya
			)
		);

		foreach($groups as $group)
			Group::create($group);
	}

}