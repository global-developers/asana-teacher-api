<?php namespace AsanaTeacher\Repositories;

use AsanaTeacher\Entity\Category;

class CategoryRepo extends BaseRepo {

	/**
	 * @return AsanaTeacher\Entity\Category
	 */
	public function getEntity() {
		return new Category;
	}

	/**
	 * @return
	 */
	public function withAll() {
		return $this->entity->withAll();
	}

	/**
	 * @return AsanaTeacher\Entity\Category
	 */
	public function newCategory() {
		return $this->getEntity();
	}

}