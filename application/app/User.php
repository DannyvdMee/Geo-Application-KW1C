<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'email', 'username', 'firstname', 'lastname', 'password', 'department', 'account_type', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	protected $appends = [
		'isTeacher',
		'isAdmin',
	];

	/**
	 * Scope for a query to get only the active users
	 *
	 * @param $query
	 * @return mixed
	 */
	public function scopeActive($query)
	{
		return $query->whereActive(true);
	}

	/**
	 * Function which returns TRUE of FALSE whether user is a teacher or not
	 *
	 * @return bool
	 */
	public function getIsTeacherAttribute()
	{
		if ($this->account_type == 'teacher') {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/**
	 * Function which returns TRUE of FALSE whether user is an admin or not
	 *
	 * @return bool
	 */
	public function getIsAdminAttribute()
	{
		if ($this->account_type == 'admin') {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
