<?php namespace AsanaTeacher\Entity;

class Schedule extends \Eloquent {
	
	/**
	 * The database table used by the entitie.
	 *
	 * @var string
	 */
	protected $table = 'schedules';
	
	/**
	 * The attibutes from the method create.
	 *
	 * @var array
	 */
	protected $fillable = ['group_collection_id', 'day', 'building', 'classroom', 'from', 'to'];

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
	 * return encode to utf8 building.
	 *
	 * @var string 
	 */
	public function getBuildingAttribute($value)
    {
        return utf8_encode($this->attributes['building']);
    }

	/**
	 * The decode to utf8 building.
	 *
	 * @var string 
	 */
	public function setBuildingAttribute($value)
    {
        if (!empty($value))
        {
            $this->attributes['building'] = utf8_decode($value);
        }
    }

}