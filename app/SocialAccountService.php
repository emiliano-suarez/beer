<?php

namespace App;

// source: https://blog.damirmiladinov.com/laravel/laravel-5.2-socialite-facebook-login.html#.WBewu3MrLrc

class SocialAccountService
{

    public function createOrGetUser($socialUser, $provider)
    {
        if ( ! isset($socialUser['email'])) {
            return false;
        }

        $user = User::where('email', $socialUser['email'])->first();

        if ($user) {
            return $this->associateSocialAccount($user, $socialUser, $provider);
        } else {
            // Register a new user
            $providerInfo =  array(
                'id' =>  isset($socialUser['id'])?$socialUser['id']:'',
                'first_name' =>  isset($socialUser['first_name'])?$socialUser['first_name']:'',
                'last_name' =>  isset($socialUser['last_name'])?$socialUser['last_name']:'',
                'name' =>  isset($socialUser['name'])?$socialUser['name']:'',
                'gender' =>  isset($socialUser['gender'])?$socialUser['gender']:'',
                'email' =>  isset($socialUser['email'])?$socialUser['email']:'',
                'verified' =>  isset($socialUser['verified'])?$socialUser['verified']:'',
                'link' =>  isset($socialUser['link'])?$socialUser['link']:'',
                'location' =>  isset($socialUser['location'])?$socialUser['location']:'',
                'birthday' =>  isset($socialUser['birthday'])?$socialUser['birthday']:'',
                'profile_photo' =>  isset($socialUser['profile_photo'])?$socialUser['profile_photo']:'',
            );

            $userData = User::setBasicInfoFromSocialAccount($socialUser);
            $userData['status'] = true;
            $userData['social'] = array($provider => $providerInfo);

            $user = User::create($userData);

            return $user;
        }
    }

    private function associateSocialAccount($user, $socialUser, $provider) {
        // Check if the user has a social account associated
        if ( ! isset($user->social->$provider)) {
            // The user does not have this social account associated. Let's do it!
            $socialInfo = array();
            foreach ($socialUser as $key => $value) {
                $socialInfo[$key] = $value;
            }
            $user = $user->updateSocialAccount($user, $socialInfo, $provider);
        }
        return $user;
    }
}
