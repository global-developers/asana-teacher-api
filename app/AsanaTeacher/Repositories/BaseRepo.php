<?php namespace AsanaTeacher\Repositories;

abstract class BaseRepo {

	/**
	 * @var object
	 */
	protected $entity;

	
	/**
	 * @return void
	 */
	public function __construct() {
        $this->entity = $this->getEntity();
    }
    
    /**
     * @return \Eloquent
     */
    abstract public function getEntity();

    /**
     * @return
     */
    public function all() {
        return $this->entity->all();
    }

    /**
     * @param int
     * @return
     */
    public function find($id) {
        return $this->entity->find($id);
    }

    /**
     * @param string
     * @param string
     * @param string
     * @return
     */
    public function where($key, $exp = '=', $value) {
        return $this->entity->where($key, $exp, $value)->first();
    }

}