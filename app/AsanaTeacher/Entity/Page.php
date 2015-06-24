<?php namespace AsanaTeacher\Entity;

class Page extends \Eloquent {

	/**
	 * The database table used by the entitie.
	 *
	 * @var string
	 */
	protected $table = 'pages';
	
	/**
	 * The attibutes from the method create.
	 *
	 * @var array
	 */
	protected $fillable = ['route_name', 'layout', 'lang', 'title', 'description', 'app_id', 'type'];

	/**
	 * The attributes defining guarded
	 *
	 * @var array
	 */	
	protected $guarded = [];

	/**
     * @return
     */
    public function app() {
    	return $this->hasOne('AsanaTeacher\Entity\App', 'id', 'app_id');
    }

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['created_at', 'updated_at'];

	/**
	 * return utf8_encode description.
	 *
	 * @var string 
	 */
	public function getDescriptionAttribute($value) {
        return utf8_encode($this->attributes['description']);
    }

	/**
	 * return utf8_encode title.
	 *
	 * @var string 
	 */
	public function getTitleAttribute() {
        return utf8_encode($this->attributes['title']);
    }

	/**
	 * The utf8_decode description.
	 *
	 * @var string 
	 */
	public function setDescriptionAttribute($value) {
        if (!empty($value))
        {
            $this->attributes['description'] = utf8_decode($value);
        }
    }

	/**
	 * The utf8_decode title.
	 *
	 * @var string 
	 */
	public function setTitleAttribute($value) {
        if (!empty($value))
        {
            $this->attributes['title'] = utf8_decode($value);
        }
    }

}