<?php namespace AsanaTeacher\Repositories;

use AsanaTeacher\Entity\User;

class UserRepo extends BaseRepo {

	/**
	 * @return AsanaTeacher\Entity\User
	 */
	public function getEntity() {
		return new User;
	}

	/**
	 * @return
	 */
	public function withAll() {
		return $this->entity->withAll();
	}

	/**
	 * @return AsanaTeacher\Entity\User
	 */
	public function newUser() {
		$user = new User();
		$user->category_id = 2;
		return $user;
	}

}