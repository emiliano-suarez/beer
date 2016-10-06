<?php

namespace App\Http\Controllers;

use App\Review;
use Validator;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'text' => 'required|min:6|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return Review::create([
            'text' => $data['text'],
        ]);
    }

    /**
     * Show the application review form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showReviewForm()
    {
        return view('reviews.form');
    }

    /**
     * Handle a review request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function review(Request $request)
    {
        $formField = $request->all();
        $this->validator($formField)->validate();
        $user = $request->user();
        // $user = Auth::user();
        
/*
var_dump($formField);
var_dump($user);
die(".");
*/
        // var_dump($user);


        $this->create($formField);
        return back()->with('status', 'Review publicada con exito!');

    }

}
