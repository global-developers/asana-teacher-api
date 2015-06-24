<?php namespace AsanaTeacher\Entity;

class NavigationAppPerm extends \Eloquent {
	
	/**
	 * The database table used by the entitie.
	 *
	 * @var string
	 */
	protected $table = 'navigation_app_perms';
	
	/**
	 * The attibutes from the method create.
	 *
	 * @var array
	 */
	protected $fillable = ['category_id', 'navigation_app_id'];

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
    public function category()
    {
        return $this->belongsTo('AsanaTeacher\Entity\Category', 'category_id', 'id');
    }

    /**
     * @return
     */
    public function navigationApp()
    {
        return $this->hasOne('AsanaTeacher\Entity\NavigationApp', 'id', 'navigation_app_id');
    }
    	
}