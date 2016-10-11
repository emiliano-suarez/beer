<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Model;

class Bar extends Model
{
    protected $collection = 'bars';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'address', 'phone', 'email',
        'url', 'photo_url', 'status', 'tags',
    ];

    /**
     * The validation rules for registering a new user.
     *
     * @var array
     */
    public $validation = [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
    ];

}
