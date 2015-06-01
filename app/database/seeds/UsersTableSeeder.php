<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$users = array(
				array(
					'full_name'   => 'Cristian Jaramillo',
					'username'    => '2015602493',
					'password'    => 'friki454_',
					'email'       => 'cristian_gerar@hotmail.com',
					'category_id' => 1,
					'authorized'  => 'on',
				),
			);

		foreach ($users as $user)
		{
			User::create($user);
		}
	}

}