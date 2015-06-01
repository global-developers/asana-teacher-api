<?php namespace AsanaTeacher\Repositories;

class UserRepo extends BaseRepo {

	/**
	 * @return \User
	 */
	public function getEntitie()
	{
		return new \User;
	}

	/**
	 * @return
	 */
	public function withAll()
	{
		return $this->entitie->withAll();
	}

	/**
	 * @return \User
	 */
	public function newUser()
	{
		$user = new \User();
		$user->category_id = 2;
		return $user;
	}

}