<?php

use AsanaTeacher\Entity\Degree;

class DegreesTableSeeder extends Seeder {

	public function run() {
		$degrees = array(
			array(
				'name' => 'Lic. en Administración Industrial'
			),
			array(
				'name' => 'Lic. en Ciencias de la Informática'
			),
			array(
				'name' => 'Lic. en Ingeniería Industrial'
			),
			array(
				'name' => 'Lic. en Ingeniería en Informática'
			),
			array(
				'name' => 'Lic. en Ingeniería en Transportes'
			),
		);

		foreach ($degrees as $degree)
			Degree::create($degree);

	}

}