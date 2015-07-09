<?php

class DashboardViewController extends \BaseController {

	/**
	 * Default Layout
	 *
	 * @var string
	 */
	protected $layout = 'layouts.apps.admin.dashboard';

	/**
	 * Display a listing of the resource.
	 * GET /userview
	 *
	 * @return Response
	 */
	public function index()
	{
		return parent::index();
	}

}