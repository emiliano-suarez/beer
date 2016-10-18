<?php

return [
    'api_url' => 'https://maps.googleapis.com/maps/api/staticmap',
    'width' => 400,
    'height' => 300,
    'zoom' => 17,
    'maptype' => 'roadmap',
    'language' => 'es',
    'markers-color' => '0x1B5E20',
    'api_key' => env(GOOGLE_API_KEY, ''),
];
