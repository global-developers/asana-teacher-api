<?php namespace AsanaTeacher\Managers;

use AsanaTeacher\Entity\User;

class UserRegisterManager extends Manager implements IManager{
	

	private $photo;

	/**
     * @return void
     * @throws \Exception
     */
    public function delete() {
        if (is_null($this->entity))
            throw new \Exception('InvalidNotFound');

        $this->entity->delete();
    }

	/**
	 * @return array
	 */
	public function getRules() {
		return [
			'full_name'             => 'min:3|max:50|required',
			'username'              => 'required|unique:users,username',
			'password'              => 'confirmed|min:6|max:25|required',
			'password_confirmation' => 'min:6|max:25|required',
			'email'                 => 'confirmed|email|required|unique:users,email',
			'email_confirmation'    => 'required',
			'category_id'			=> 'exists:categories,id',
			'photo'					=> 'mimes:jpg,jpeg,png',
			'authorized'            => 'in:on,off',
		];
	}

	/**
	 * @param array $data
	 * @return array $data
	 */
	public function preparateData(array $data) {
		$data['full_name'] = strip_tags($data['full_name']);

		$delete = ['password_confirmation', 'email_confirmation'];

		foreach ($delete as $value)
			unset($data[$value]);

		dd($data['photo']);

		return $data;
	}

	public function save()
	{
		parent::save();
		$photo = $this->data['photo'];
		$photo_name = $this->entity->id . '.' . $photo->getClientOriginalExtension();
		$photo->move(storage_path('users'), $photo_name);
		$this->entity->photo = $photo_name;
		$this->entity->save();
	}

	/**
	 * @return void
	 * @throws ManagerValidationException
	 */
	public function update() {

		if (is_null($this->entity))
			throw new \Exception('InvalidNotFoundUser');
		
		$id = $this->entity->id;

		$validation = \Validator::make($this->data, $this->rules);

		if ($validation->fails()) {
			$users = User::where('email', $this->data['email'])->orWhere('username', $this->data['username'])->get();
			
			if (count($users) != 1)
				throw new ManagerValidationException('Validation failed', $validation->messages());
		}

		if (isset($this->data['category_id']))
			$this->entity->category_id = $this->data['category_id'];

		$this->entity->update($this->prepareData($this->data));
	}

}