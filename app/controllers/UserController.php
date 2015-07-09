<?php

use AsanaTeacher\Managers\UserRegisterManager;
use AsanaTeacher\Repositories\UserRepo;

class UserController extends \BaseController {

	private $repository;

	public function __construct(UserRepo $repository) {
		$this->repository = $repository;
	}

	/**
	 * Display a listing of the resource.
	 * GET /user
	 *
	 * @return Response
	 */
	public function index()
	{
		return array("data" => $this->repository->withAll());
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /user/create
	 *
	 * @return Response
	 */
	public function create() {
		return Redirect::route('sign-up');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /user
	 *
	 * @return Response
	 */
	public function store()
	{
		$manager = new UserRegisterManager($this->repository->newUser(), Input::all());
        
        $manager->save();

        if(!Request::ajax())
        	return Redirect::route('login');

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
		$user = $this->repository->find($id);

		if($user == NULL)
			throw new \Exception("NotFoundUserID($id)");

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
		return Redirect::to('/');
	}

	/**
	 *
	 * @param int id
	 * @return Response
	 */
	public function photo($id)
	{
		$user = $this->repository->find($id);

		$file = $user->photo;

		$path = str_replace("/", "\\", storage_path("users/" . $file));

		if (!\File::exists($path))
		{
			return "No existe {$path} ";
		}

		$file_content = file_get_contents($path);

		$headers = array(
			//"Accept-Ranges", "bytes",
			//"Cache-Control" => "max-age=".(60*60),
			//"Content-Transfer-Encoding" => "chunked",
			"Content-Type" => mime_content_type($path),
			//"Content-length", filesize($path),
			//"Content-Disposition", " inline; filename=\"{$file}\"",
			//"Expires" => gmdate("D, d M Y H:i:s", time() + (60*60)) . " GMT",
			//"X-Pad" => "avoid browser bug",
		);

		return Response::make($file_content, 200, $headers);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /user/{id}
	 *
	 * @param  int
	 * @return Response
	 */
	public function update($id)
	{
		$manager = new UserRegisterManager($this->repository->find($id), Input::all());
		
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
		$manager = new UserRegisterManager($this->repository->find($id), []);
		
		$manager->delete();

		return $this->index();
	}

}