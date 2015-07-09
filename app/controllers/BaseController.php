<?php

use AsanaTeacher\Repositories\PageRepo;

class BaseController extends Controller {

	/**
	 * Default Layout
	 *
	 * @var string
	 */
	protected $layout = 'start';

	/**
	 * Desing params
	 * 
	 * @var array
	 */
	protected $params = array();

	/**
	 * @param array|string $var
	 * @param mixed $param
	 * @return void 
	 */
	protected function addParam($var, $param = NULL) {
		if (is_array($var) && is_null($param)) {		
			foreach ($var as $key => $value) {			
				extract([$key => $value]);			
				$this->params += compact($key);
				unset($$key);			
			}
			unset($key);
			unset($value);
		} elseif(is_string($var)) {			
			extract([$var => $param]);			
			$this->params += compact($var);			
			unset($$var);
		}
	}

	/**
	 * @return void
	 */
	protected function setupPage() {
		$page = new PageRepo();
		$type = \Auth::check() ? 'private' : 'public';
		$page = $page->getByRouteName(Route::currentRouteName(), $type);
		if(is_object($page)) $this->addParam('page', $page);
		unset($page);
	}

	protected function loadLayout($name)
	{
		$this->layout = App::where('name', $name)->lists('layout');
		$this->layout = isset($this->layout[0]) ? $this->layout[0] : 'layouts.apps.default';
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout() {
		// your code.
	}

	/**
	 * @return \View
	 */
	protected function index() {
		return \View::make($this->layout, $this->params);
	}

}

