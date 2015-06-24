<?php namespace AsanaTeacher\Managers;

use AsanaTeacher\Entity\Category;

class CategoryRegisterManager extends Manager implements IManager{
	
	/**
	 * @return void
	 * @throws \Exception
	 */
	public function delete() {
		if (is_null($this->entity))
			throw new \Exception("InvalidNotFoundCategory");

		$this->entity->delete();
	}

	/**
	 * @return array
	 */
	public function getRules() {
		return [
			'name' => 'min:3|max:50|required|unique:categories,name',
		];
	}

	/**
	 * @return void
	 * @throws \Exception
	 */
	public function update() {
		
		if(is_null($this->entity))
			throw new \Exception("InvalidNotFoundCategory");

		$id = $this->entity->id;

		$validation = \Validator::make($this->data, $this->rules);

		if ($validation->fails()){

			$categories = Category::where('name')->get();

			if (count($categories) != 1)
				throw new ManagerValidationException('Validation failed', $validation->messages());

			if ($categories[0]->id != $id)
				throw new \Exception('DuplicateUniqueData');

		}

		$this->entity->update($this->data);

	}

}