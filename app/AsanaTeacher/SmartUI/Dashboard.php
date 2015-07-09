<?php namespace AsanaTeacher\SmartUI;

use AsanaTeacher\Entity\User;
use AsanaTeacher\Entity\NavigationAppPerm;

class Dashboard
{
	
	/**
	 * Set ribbon breadcrumbs config
	 *
	 * @var array
	 */
	protected $breadcrumbs = array();

	/**
	 * Set true for lock.php and login.php
	 *
	 * @var boolean
	 */
	protected $no_main_header = false;
	
	/**
	 * Optional properties for <body>
	 *
	 * @var array
	 */
	protected $page_body_prop = array();
	
	/**
	 * Optional properties for <html>
	 *
	 * @var array
	 */
	protected $page_html_prop = array();

	/**
	 * Navigation array config
	 *
	 * @var array
	 */
	protected $page_nav = array();

	/**
	 * @var aCube\Entities\User
	 */
	protected $user;

	/**
	 *
	 * @return void
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * @return array
	 */
	public function getBreadcrumbs()
	{
		return $this->breadcrumbs;
	}

	/**
	 * @return boolean
	 */
	public function getNoMainHeader()
	{
		return $this->no_main_header;
	}

	/**
	 * @return array
	 */
	public function getPageBodyProp()
	{
		return $this->page_body_prop;
	}

	/**
	 * @return array
	 */
	public function getPageHTMLProp()
	{
		return $this->page_body_prop;
	}

	/**
	 * @return array
	 */
	public function getPageNav()
	{
		return $this->page_nav;
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return void
	 */
	public function setBreadcrumb($key, $value)
	{
		$this->breadcrumbs[$key] = $value;
	}

	/**
	 * @param boolean $value
	 * @return void
	 */
	public function setNoMainHeader($value)
	{
		$this->no_main_header = $value;
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return void
	 */
	public function setPageBodyProp($key, $value)
	{
		$this->page_body_prop[$key] = $value;
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return void
	 */
	public function setPageHTMLProp($key, $value)
	{
		$this->page_html_prop[$key] = $value;
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return void
	 */
	public function setPageNav($key, $value)
	{
		$this->page_nav[$key] = $value;
	}

	/**
	 * @return void
	 */
	public function getAllConfig()
	{
		return array(
				'breadcrumbs'    => $this->breadcrumbs,
				'no_main_header' => $this->no_main_header,
				'page_body_prop' => $this->page_body_prop,
				'page_html_prop' => $this->page_html_prop,
				'page_nav'       => $this->page_nav,
			);
	}

	/**
	 * @return void
	 */
	public function setupNav()
	{
		
		$perms = NavigationAppPerm::with(array(
		'navigationApp' => function ($query){
			$query->with('app');
		}))->where('category_id', $this->user->category_id)->get();

		$items = array();

		foreach ($perms as $perm)
		{
			$item = array();
			
			$item['name'] = $perm->navigationApp->app->name;
			$item['title'] = $perm->navigationApp->title;

			if (!is_null($perm->navigationApp->url) && !is_null($perm->navigationApp->app->layout))
				$item['url'] = $perm->navigationApp->url;
			if (!is_null($perm->navigationApp->target))
				$item['url_target'] = $perm->navigationApp->target;
			if (!is_null($perm->navigationApp->icon))
				$item['icon'] = $perm->navigationApp->icon;
			if (!is_null($perm->navigationApp->label_htm))
				$item['label_htm'] = $perm->navigationApp->label_htm;
			if (!is_null($perm->navigationApp->parent))
				$item['parent'] = $perm->navigationApp->parent;

			$items[$perm->navigationApp->app->name] = $item;
		}

		if (count($items) > 1) $items = $this->generateNav($items);
		
		$this->page_nav = $items;
	}	

	/**
	 * @return array
	 */
	public function generateNav($items)
	{
		$nav = array();

		foreach ($items as $key => $item)
		{
			if (isset($item['parent']))
			{
				$this->addItem($item, $key, $nav);
			} else {
				$item['sub'] = isset($nav[$key]['sub']) ? $nav[$key]['sub'] : array();
				if(count($item['sub']) == 0) unset($item['sub']); 
				$nav[$key] = $item;
			}
		}

		return $nav;
	}

	/**
	 * @param array $children
	 * @param string $children
	 * @param array $parent
	 * @return void
	 */
	public function addItem(array &$children, &$children_name, array &$parent)
	{
		$array = preg_split("/[.]/", $children['parent']);
		$parent_name = $array[0];

		if (!isset($parent[$parent_name]['sub']))
			$parent[$parent_name]['sub'] = array();

		if(count($array) == 1)
		{
			unset($children['parent']);				
			$parent[$parent_name]['sub'][$children_name] = $children;
		} else {
			unset($array[0]);
			$children['parent'] = implode(".", $array);
			$this->addItem($children, $children_name, $parent[$parent_name]['sub']);
		}
	}

}