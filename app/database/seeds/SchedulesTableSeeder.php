<?php

use AsanaTeacher\Entity\Schedule;

class SchedulesTableSeeder extends Seeder {

	public function run()
	{
		$schedules = array(
			array(
				'group_collection_id' => 1,        // grupo, maestro, curso
				'day' => 3,			   // Dia
				'building' => 'Edificio de Ciencias Sociales', // Edificio
				'classroom' => '320',              // Salón
				'from' => '08:30:00',              // Hora de incio
				'to'   => '10:00:00'               // Hora de salida
			),
			array(
				'group_collection_id' => 2,        
				'day' => 2,			   
				'building' => 'Edificio de Ingenieria', 
				'classroom' => 'D1',           
				'from' => '07:00:00',
				'to'   => '09:30:00'
			),
			array(
				'group_collection_id' => 2,        
				'day' => 4,			   
				'building' => 'Edificio de Ingenieria', 
				'classroom' => '207',              
				'from' => '07:00:00',
				'to'   => '09:00:00'
			),
			array(
				'group_collection_id' => 3,        
				'day' => 2,			   
				'building' => 'Edificio de Ingenieria', 
				'classroom' => '309',              
				'from' => '18:00:00',
				'to'   => '20:30:00'
			),
			array(
				'group_collection_id' => 3,        
				'day' => 4,			   
				'building' => 'Edificio de Ingenieria', 
				'classroom' => '309',              
				'from' => '19:00:00',
				'to'   => '21:00:00'
			),
		);

		foreach($schedules as $schedule)
			Schedule::create($schedule);
	}

}