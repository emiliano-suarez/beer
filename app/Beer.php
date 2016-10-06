<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Model;

class Beer extends Model
{
    protected $collection = 'beers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The validation rules for registering a new user.
     *
     * @var array
     */
    public $validation = [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6',
    ];


    /**
     * Get user social account.
     */
/*
    public function socialAccount()
    {
        return $this->hasOne(SocialAccount::class);
    }
*/
}
