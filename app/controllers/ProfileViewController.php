<?php

use AsanaTeacher\Entity\User;

class ProfileViewController extends \BaseController {

	/**
	 * Default Layout
	 *
	 * @var string
	 */
	protected $layout = 'layouts.apps.profile';

	/**
	 * 
	 * GET app/profile
	 *
	 * @return Response
	 */
	public function index($id = null)
	{

		if (is_null($id))
			$id = Auth::user()->id;

		$user = User::where('id', $id)->with(
			array(
				'category' => function($query) {

				}, 'joinGroupCollections' => function($query) {
					$query->with(
						array(
							'groupCollection' => function($query) {
								$query->with('group', 'teacher', 'course');
							}
						)
					);
				}
			)
		)->get();

		foreach ($user as $value) {	}

		$user = array('user' => $value);

		$this->addParam($user);
		
		return parent::index();
	}

}