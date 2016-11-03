<?php

return [
    'facebook_app_id' => env('FACEBOOK_APP_ID', ''),
    'facebook_app_secret' => env('FACEBOOK_APP_SECRET', ''),
    'facebook_scope' => array('public_profile,email'), // ,user_birthday, user_location
    'facebook_fields' => 'id,name,first_name,last_name,gender,hometown,email,verified,link,location,birthday',
    'facebook_profile_photo_host' => 'https://graph.facebook.com/',
];
