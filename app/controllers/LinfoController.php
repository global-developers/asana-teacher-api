<?php

use Linfo\Linfo;

class LinfoController extends \BaseController {

	/**
	 * @var \Linfo
	 */
	protected $Linfo;

	/**
	 * @return void
	 */
	public function __construct(Linfo $Linfo)
	{
		$this->Linfo = $Linfo;
		$this->layout = 'layouts.apps.admin.widgets.linfo.';
	}

	/**
	 * Display a listing of the resource.
	 * GET /linfo/json/{$method}/
	 * 
	 * @param string $method
	 * @return \Response
	 */
	public function json($method)
	{
		$response = call_user_func_array(array($this->Linfo, 'get' . ucwords($method)), array());

		return \Response::json($response);
	}

	/**
	 * Display a listing of the resource.
	 * GET /linfo/widget/{$method}/
	 * 
	 * @param string $method
	 * @return \Response
	 */
	public function widget($method)
	{
		$this->addParam($method, call_user_func([$this->Linfo, 'get' . ucwords($method)]));
		$this->layout .= $method;
		
		return $this->index();
	}	

}