<?php

namespace App;
use App\LostAndFound;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword as ResetPassword;


class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     
    public function postLostAndFound()
	{
		return $this->hasMany('App\LostAndFound', 'reporter_id' , 'id');
	} 
	protected $table="users";
	

    protected $fillable = [
        'first_name' , 'last_name' , 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
