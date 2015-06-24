<?php

use AsanaTeacher\Managers\CategoryRegisterManager;
use AsanaTeacher\Repositories\CategoryRepo;

class CategoryController extends \BaseController {

	private $repository;

	public function __construct(CategoryRepo $repository) {
		$this->repository = $repository;
	}

	/**
	 * Display a listing of the resource.
	 * GET /category
	 *
	 * @return Response
	 */
	public function index() {
		return $this->repository->all();
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /category/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return Input::all();
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /category
	 *
	 * @return Response
	 */
	public function store()
	{
		$manager = new CategoryRegisterManager($this->repository->newCategory(), Input::all());
        
        $manager->save();

        return $this->index();
	}

	/**
	 * Display the specified resource.
	 * GET /category/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$category = $this->repository->find($id);

		if(is_null($category))
			throw new \Exception("NotFoundCategoryID($id)");

		return $category;
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /category/{id}/edit
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
	 * PUT /category/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$manager = new CategoryRegisterManager($this->repository->find($id), Input::all());
		
		$manager->update();

		return $this->index();
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /category/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$manager = new CategoryRegisterManager($this->repository->find($id), []);
		
		$manager->delete();

		return $this->index();
	}

}