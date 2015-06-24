<?php namespace AsanaTeacher\Entity;

class Degree extends \Eloquent {
	
	/**
	 * The database table used by the entitie.
	 *
	 * @var string
	 */
	protected $table = 'degrees';
	
	/**
	 * The attibutes from the method create.
	 *
	 * @var array
	 */
	protected $fillable = ['name'];

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
	 * return utf8_encode name.
	 *
	 * @var string 
	 */
	public function getNameAttribute($value)
    {
        return utf8_encode($this->attributes['name']);
    }

	/**
	 * The utf8_decode name.
	 *
	 * @var string 
	 */
	public function setNameAttribute($value)
    {
        if (!empty($value))
        {
            $this->attributes['name'] = utf8_decode($value);
        }
    }

}