<?php namespace AsanaTeacher\Entity;

class NavigationApp extends \Eloquent {
	
	/**
	 * The database table used by the entitie.
	 *
	 * @var string
	 */
	protected $table = 'navigation_apps';
	
	/**
	 * The attibutes from the method create.
	 *
	 * @var array
	 */
	protected $fillable = ['app_id', 'title', 'url', 'target', 'icon', 'label_htm', 'parent'];

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
    public function app()
    {
    	return $this->hasOne('AsanaTeacher\Entity\App', 'id', 'app_id');
    }

	/**
	 * return encode to utf8 title.
	 *
	 * @var string
	 * @return string
	 */
	public function getTitleAttribute($value) {
        return utf8_encode($this->attributes['title']);
    }

	/**
	 * The decode to utf8 title.
	 *
	 * @var string
	 * @return void
	 */
	public function setTitleAttribute($value) {
        if (!empty($value)) 
        	$this->attributes['title'] = utf8_decode($value);
    }

}