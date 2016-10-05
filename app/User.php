<?php

namespace App;

use Illuminate\Notifications\Notifiable;

use Illuminate\Auth\Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model as Model;
use App\Http\Controllers\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User
    extends
        Model
    implements
        AuthenticatableContract,
        AuthorizableContract,
        CanResetPasswordContract
{
    use  Authenticatable, Authorizable, CanResetPassword, Notifiable;

    protected $collection = 'users';

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
