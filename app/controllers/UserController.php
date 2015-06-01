<?php

use AsanaTeacher\Managers\RegisterManager;
use AsanaTeacher\Managers\ManagerValidationException;
use AsanaTeacher\Repositories\UserRepo;

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /user
	 *
	 * @return Response
	 */
	public function index()
	{
		return User::withAll();
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /user/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return Input::all();
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /user
	 *
	 * @return Response
	 */
	public function store()
	{

		$userRepo = new UserRepo();

		$manager = new RegisterManager($userRepo->newUser(), Input::all());
        
        unset($userRepo);
        
        $manager->save();

        return $this->index();
	}

	/**
	 * Display the specified resource.
	 * GET /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);

		if($user == NULL) {
			throw new ManagerValidationException("NotFoundUserID($id)", NULL);
		}

		return $user;
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /user/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return Input::all();
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$userRepo = new UserRepo();

		$manager = new RegisterManager($userRepo->find($id), Input::all());

		unset($userRepo);

		$manager->update();

		return $this->index();
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$userRepo = new UserRepo();

		$manager = new RegisterManager($userRepo->find($id), []);

		unset($userRepo);

		$manager->delete();

		return $this->index();
	}

}