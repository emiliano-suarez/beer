<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Model;

class Beer extends Model
{
    protected $collection = 'beers';

    public static function getClassName() {
        return get_class();
    }

    public static function incrementReviewsCounter($id) {
        return Beer::where('_id', $id)->increment('replies_quantity');
    }
}
