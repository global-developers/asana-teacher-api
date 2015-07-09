<?php

use AsanaTeacher\Entity\User;

class UsersTableSeeder extends Seeder {

	public function run()
	{

		$faker = Faker\Factory::create();
		
		$users = array(
				array(
					'full_name'   => 'Cristian Gerardo Jaramillo Cruz',
					'username'    => '2015602493',
					'password'    => 's3cret',
					'photo'	      => '1.jpg',
					'email'       => 'cristian_gerar@hotmail.com',
					'category_id' => 1,
					'authorized'  => 'on',
				),
				array(
					'full_name'   => 'Anita Alcantara Gonzalez',
					'password'    => 's3cret',
					'photo'       => 'female.png',
					'email'       => 'ipntareas2014@hotmail.com',
					'category_id' => 3,
					'authorized'  => 'on',
				),
				array(
					'full_name'   => 'Ana Cecilia Villagómez Sandoval',
					'password'    => 's3cret',
					'photo'       => 'female.png',
					'email'       => $faker->email,
					'category_id' => 3,
					'authorized'  => 'on',
				),
				array(
					'full_name'   => 'Carlos Calva Cruz',
					'password'    => 's3cret',
					'photo'       => 'male.png',
					'email'       => $faker->email,
					'category_id' => 3,
					'authorized'  => 'on',
				),
				array(
					'full_name'   => 'Judith Sonck Ledesma',
					'password'    => 's3cret',
					'photo'       => 'female.png',
					'email'       => $faker->email,
					'category_id' => 3,
					'authorized'  => 'on',
				),
				array(
					'full_name'   => 'Alberto Isaac Ramírez Pérez',
					'password'    => 's3cret',
					'photo'       => 'male.png',
					'email'       => $faker->email,
					'category_id' => 3,
					'authorized'  => 'on',
				),
				array(
					'full_name'   => 'Juan Carlos Cruz Romero',
					'password'    => 's3cret',
					'photo'       => 'male.png',
					'email'       => $faker->email,
					'category_id' => 3,
					'authorized'  => 'on',
				),
			);

		foreach ($users as $user)
			User::create($user);
	}

}