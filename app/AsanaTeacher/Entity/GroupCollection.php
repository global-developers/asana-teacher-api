<?php namespace AsanaTeacher\Entity;

class GroupCollection extends \Eloquent {

	/**
	 * The database table used by the entitie.
	 *
	 * @var string
	 */
	protected $table = 'group_collections';
	
	/**
	 * The attibutes from the method create.
	 *
	 * @var array
	 */
	protected $fillable = ['group_id', 'teacher_id', 'course_id'];

	/**
	 * The attributes defining guarded
	 *
	 * @var array
	 */	
	protected $guarded = [];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['created_at', 'updated_at'];
	
	/**
     * @return
     */
    public function group()
    {
    	return $this->hasOne('AsanaTeacher\Entity\Group', 'id', 'group_id');
    }

	/**
     * @return
     */
    public function teacher()
    {
    	return $this->hasOne('AsanaTeacher\Entity\User', 'id', 'teacher_id');
    }

    /**
     * @return
     */
    public function course()
    {
    	return $this->hasOne('AsanaTeacher\Entity\Course', 'id', 'course_id');
    }

}