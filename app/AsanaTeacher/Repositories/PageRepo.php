<?php namespace AsanaTeacher\Repositories;

use AsanaTeacher\Entity\Page;

class PageRepo extends BaseRepo
{
	
	/**
	 * The filter page not authorized
	 * 
	 * @return Eloquent
	 */
	public function getByRouteName($routeName, $type = 'public') {
    	return $this->entity->where('route_name', $routeName)->where('type', $type)->with('app')->first();
    }

	/**
	 * @return AsanaTeacher\Entity\Page
	 */
	public function getEntity() {
		return new Page;
	}

}