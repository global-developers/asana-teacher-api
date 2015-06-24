<?php

use AsanaTeacher\Entity\Course;

class CoursesTableSeeder extends Seeder {

	public function run()
	{
		$courses = array(
			array(
				'name' => 'Desarrollo de la Creatividad',
			),
			array(
				'name' => 'Cálculo Diferencial e Integral',
			),
			array(
				'name' => 'Probabilidad',
			),
			array(
				'name' => 'Fundamentos de OOP',
			),
			array(
				'name' => 'Algoritmos Computacionales',
			),
			array(
				'name' => 'Diseño de Base de Datos',
			)
		);

		foreach ($courses as $course)
			Course::create($course);
	}

}