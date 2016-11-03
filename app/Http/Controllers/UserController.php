<?php

namespace App\Http\Controllers;

use App\User;
use App\SocialAccountService;
use Illuminate\Http\Request;
use Facebook;
use GuzzleHttp\Client as GuzzleClient;
use App\Facebook\HttpClients\Guzzle6HttpClient;

class UserController extends Controller
{
    public function facebookLogin(Request $request)
    {
        $accessToken = ($request->accessToken ? $request->accessToken : '');
        $facebookUser = $this->getFacebookUser($accessToken);
        $result = $this->getLoggedInUser($facebookUser);
        return ['status' => 200];
    }

    private function getFacebookUser($accessToken) {

        $client = new GuzzleClient();

        $fb = new Facebook\Facebook([
          'http_client_handler' => new Guzzle6HttpClient($client),
          'app_id' => config('social.facebook_app_id'),
          'app_secret' => config('social.facebook_app_secret'),
          'default_graph_version' => 'v2.8',
        ]);

        try {
            // Returns a `Facebook\FacebookResponse` object
            $response = $fb->get('/me?fields=' . config('social.facebook_fields'), $accessToken);
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $user = $response->getGraphUser();

        $user['profile_photo'] = config('social.facebook_profile_photo_host') . 
                                 $user['id'] . '/picture?type=large';
                                
        return $user;
    }

    private function getLoggedInUser($socialUser, $provider='facebook')
    {
        $service = new SocialAccountService();
        $user = $service->createOrGetUser($socialUser, $provider);
        auth()->login($user);
        return true;
    }

}
