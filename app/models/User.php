<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	
	/**
	 * The database table used by the entitie.
	 *
	 * @var string
	 */
	protected $table = 'users';
	
	/**
	 * The attibutes from the method create.
	 *
	 * @var array
	 */
	protected $fillable = ['full_name', 'username', 'password', 'email', 'authorized'];

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
	protected $hidden = ['password', 'remember_token', 'created_at', 'updated_at'];

	/**
	 * return encode to utf8 full_name.
	 *
	 * @var string 
	 */
	public function getFullNameAttribute($value)
    {
        return utf8_encode($this->attributes['full_name']);
    }

	/**
	 * The decode to utf8 full_name.
	 *
	 * @var string 
	 */
	public function setFullNameAttribute($value)
    {
        if (!empty($value))
        {
            $this->attributes['full_name'] = utf8_decode($value);
        }
    }

	/**
	 * The password encrypt.
	 *
	 * @var string 
	 */
	public function setPasswordAttribute($value)
    {
        if (!empty($value))
        {
            $this->attributes['password'] = \Hash::make($value);
        }
    }

    /**
     * @return
     */
    public function category()
    {
    	return $this->hasOne('Category', 'id', 'category_id');
    }

    /**
     * @return
     */
//	public function userDashboardConfig()
//	{
//		return $this->belongsTo('UserDashboardConfig', 'id', 'id');
//	}

    /**
     * @return
     */
    public function scopeWithAll($query)
    {
    	return $query->with('category')->get();
    }

}