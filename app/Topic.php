<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Model;

class Topic extends Model
{
    protected $collection = 'topics';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'published_at', 'deleted_at'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'user_id', 'user_name', 'user_photo',
        'slug', 'tags', 'published_at', 'subject', 'description',
        'photo_url', 'video_url', 'show_in_home', 'status', 'replies_quantity',
        'likes_quantity'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'show_in_home' => 'boolean',
        'status' => 'integer',
    ];

    /**
     * The default attributes.
     *
     * @var array
     */
    protected $attributes = [
        'published_at' => null,
        'show_in_home' => false,
        'status' => 1,
        'replies_quantity' => 0,
        'likes_quantity' => 0,
    ];

    /**
     * The validation rules for registering a new user.
     *
     * @var array
     */
    public $validation = [
        'text' => 'required|min:6|max:255',
    ];

}
