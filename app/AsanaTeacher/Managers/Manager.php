<?php namespace AsanaTeacher\Managers;

abstract class Manager
{

	 /**
     * @var \Eloquent $entity
     */
    protected $entity;

    /**
     * @var array
     */
    protected $data  = array();

    /**
     * @var array
     */
    protected $rules = array();

    /**
     * @param \Eloquent $entity
     * @param array $data
     * @return void
     */
    public function __construct($entity, array $data) {
        $this->entity = $entity;
        $this->rules  = $this->getRules();
        $this->data   = array_only($data, array_keys($this->rules)); 
    }

    public function addData($key, $value) {
        $this->data[$key] = $value;
    }

    public function addRule($key, $value) {
        $this->rules[$key] = $value;
    }

    /**
     * @return array
     */
    abstract public function getRules();

    /**
     * @return void
     * @throws ValidationException
     */
    public function isValid() {
        $validation = \Validator::make($this->data, $this->rules);

        if ($validation->fails())
            throw new ManagerValidationException('Validation failed', $validation->messages());
    }

    /**
     * @var array $data
     * @return array $data
     */
    public function prepareData(array $data) {
        return $data;
    }

    /**
     * @return void
     * @throws ValidationException
     */
    public function save() {
        $this->isValid();
        $this->entity->fill($this->prepareData($this->data));
        $this->entity->save();
    }

}