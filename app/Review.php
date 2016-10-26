<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Model;

class Review extends Model
{
    protected $collection = 'reviews';

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
        'type', 'user_id', 'user_name', 'reviewed_id', 'reviewed_name',
        'reviewed_slug', 'tags', 'published_at', 'text', 'show_in_home',
        'status', 'reviewed_type'
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
        'status' => 1
    ];

    /**
     * The validation rules for registering a new user.
     *
     * @var array
     */
    public $validation = [
        'text' => 'required|min:6|max:255',
    ];


    /**
     * The attributes will be indexed by ElasticSearch
     *
     * @var array
     */
    //public static $schema;

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
/*
    protected static function boot()
    {
        parent::boot();
        static::$schema = [
            'slug',
            'type',
            'tags' => function($item) {
                if ($item->tags) {
                    return array_pluck($item->tags, 'name');
                } else {
                    return $item->tags()->find($item->tag_ids)->pluck('name')->toArray();
                }
            },
        ];
    }

    'type', 'user_id', 'username', 'reviewed_id', 'reviewed_name',
    'slug', 'tags', 'published_at', 'text', 'show_in_home',
    'status'
*/
}
