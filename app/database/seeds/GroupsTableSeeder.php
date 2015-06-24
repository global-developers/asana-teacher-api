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
				'name' => '1CM22'
			),
			array(
				'name' => '1CM30'
			),
			array(
				'name' => '2CM22'
			),
			array(
				'name' => '2CM32'
			),
			array(
				'name' => '2CV32'
			),
			array(
				'name' => '2CV40'
			)
		);

		foreach($groups as $group)
			Group::create($group);
	}

}