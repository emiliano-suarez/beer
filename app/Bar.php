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

    public function getMapUrl() {
        $apiUrl = config('map.api_url');
        $zoom = config('map.zoom');
        $mapType = config('map.maptype');
        $language = config('map.language');
        $markersColor = config('map.markers-color');
        $width = config('map.width');
        $height = config('map.height');
        $size = $width . 'x' . $height;
        $apiKey = config('map.api_key');

        // Fixme:
        $lat = '-34.5717947';
        $long = '-58.4313896';
        $coordinates = $lat . ',' . $long;

        $mapUrl = $apiUrl . '?zoom=' . $zoom . '&size=' . $size;
        $mapUrl .= '&maptype=' . $mapType . '&language=' . $language;
        $mapUrl .= '&markers=color:' . $markersColor . '|' . $coordinates;
        $mapUrl .= '&key=' . $apiKey;

        return $mapUrl;
// https://maps.googleapis.com/maps/api/staticmap?zoom=17&size=400x250&maptype=roadmap&language=es&markers=color:0x1B5E20|-34.5717947,-58.4313896&key=AIzaSyDFPDR43uGytO7LPEfFLOkLPJIGWUe_5ps
        
    }

    public static function getClassName() {
        return get_class();
    }

    public static function incrementReviewsCounter($id) {
        return Bar::where('_id', $id)->increment('replies_quantity');
    }
}
