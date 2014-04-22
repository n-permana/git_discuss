<?php namespace Elearning\Models;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Support\Facades\Hash;

class User extends \Eloquent implements UserInterface, RemindableInterface {

    protected $guarded = ['id','created_at','updated_at'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'elearning';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
        
        public function question()
        {
            return $this->hasMany('Elearning\Models\question');
        }

        public function setPasswordAttribute($value)
        {
            $this->attributes['password'] = Hash::make($value);
        }
        
        public function messageDistribution()
        {
            $this->hasMany('Elearning\Models\messageDistribution');
        }
}