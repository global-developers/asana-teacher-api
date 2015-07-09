<?php namespace AsanaTeacher\Entity;

class JoinGroupCollection extends \Eloquent {

	/**
	 * The database table used by the entitie.
	 *
	 * @var string
	 */
	protected $table = 'join_group_collections';
	
	/**
	 * The attibutes from the method create.
	 *
	 * @var array
	 */
	protected $fillable = ['group_collection_id', 'student_id'];

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
    public function groupCollection()
    {
    	return $this->hasOne('AsanaTeacher\Entity\GroupCollection', 'id', 'group_collection_id');
    }

	/**
     * @return
     */
    public function student()
    {
    	return $this->hasOne('AsanaTeacher\Entity\User', 'id', 'student_id');
    }

}