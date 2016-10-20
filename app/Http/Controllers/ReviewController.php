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
    protected $redirectTo = '/';

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
        return Review::create($data);
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
        // Adding user information into the array

        $formField['status'] = 0;
        $formField['show_in_home'] = 0;

        if ($user) {
            $formField['user_id'] = $user->id;
            $formField['user_name'] = $user->name;
        }

        $this->create($formField);
        return back()->with('status', 'Review publicada con exito!');

    }

    /**
     * Get all the reviews made for a Bar, Beer or Comment.
     *
     * @param bar_id, beer_id or comment_id $reviewedId
     * @return collection of reviews
     */
    public static function getReviews($reviewedId) {
        $reviews = Review::where('reviewed_id', $reviewedId)->get()->all();
        return $reviews;
    }

}
