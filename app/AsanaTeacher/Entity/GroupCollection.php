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
	
}