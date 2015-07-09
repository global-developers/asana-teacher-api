<?php

use AsanaTeacher\SmartUI\Dashboard;

/**
 * 
 */
class AsanaTeacherController extends BaseController
{
	/**
	 * Default Layout
	 *
	 * @var string
	 */
	protected $layout = 'dashboard';

	/**
	 * GET /login
	 *
	 * @return \View
	 */
	public function index()
	{
		$dashboard = new Dashboard(Auth::user());
		$dashboard->setPageHTMLProp('class', 'smart-style-1 fixed-navigation fixed-header fixed-ribbon');
		// $dashboard->setPageBodyProp('class', 'smart-style-2');
		$dashboard->setupNav();
		// dd($dashboard->getAllConfig());
		$this->addParam($dashboard->getAllConfig());
		return parent::index();
	}

}