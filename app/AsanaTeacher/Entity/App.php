<?php namespace AsanaTeacher\Entity;

class App extends \Eloquent {

	/**
	 * The database table used by the entitie.
	 *
	 * @var string
	 */
	protected $table = 'apps';
	
	/**
	 * The attibutes from the method create.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'layout', 'description'];

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
    public function navigationApps()
    {
    	return $this->hasMany('AsanaTeacher\Entity\NavigationApp', 'app_id', 'id');
    }

	/**
	 * return utf8_encode description.
	 *
	 * @var string 
	 */
	public function getDescriptionAttribute($value)
    {
        return utf8_encode($this->attributes['description']);
    }

	/**
	 * The utf8_decode description.
	 *
	 * @var string 
	 */
	public function setDescriptionAttribute($value)
    {
        if (!empty($value))
        {
            $this->attributes['description'] = utf8_decode($value);
        }
    }

}