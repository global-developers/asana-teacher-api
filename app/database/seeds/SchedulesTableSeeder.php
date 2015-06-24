<?php

use AsanaTeacher\Entity\Schedule;

class SchedulesTableSeeder extends Seeder {

	public function run()
	{
		$schedules = array(
			array(
				'group_collection_id' => 1,
				'day' => 'wednesday',
				'building' => 'Ciencias Sociales',
				'classroom' => '320',
				'from' => '08:30:00',
				'to'   => '10:00:00'
			)
		);

		foreach($schedules as $schedule)
			Schedule::create($schedule);
	}

}