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
        'name', 'email', 'password', 'profile_photo', 'status',
        'social', 'confirmation_token',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'integer',
    ];

    /**
     * The default attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => 0,
        'social' => [],
        'profile_photo' => 'images/empty_profile.jpg',
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

    public static function setBasicInfoFromSocialAccount($socialUser) {
        return array(
            'name' => $socialUser['first_name'],
            'email' => $socialUser['email'],
            'profile_photo' => $socialUser['profile_photo'],
        );
    }

    public function updateSocialAccount($user, $providerInfo, $provider) {

        $socialInfo = $user->social;
        $socialInfo[$provider] = $providerInfo;

        $user->social = $socialInfo;

        $user->save();
        return $user;
    }
}
