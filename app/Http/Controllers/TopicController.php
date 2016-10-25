<?php

namespace App\Http\Controllers;

use App\Topic;
use Validator;
use Illuminate\Http\Request;

class TopicController extends Controller
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
            'subject' => 'required|min:6|max:100',
            'description' => 'required|min:30|max:255'
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
        return Topic::create($data);
    }

    /**
     * Show the application review form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTopicForm()
    {
        return view('topic.form');
    }

    /**
     * Handle a review request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function topic(Request $request)
    {
        $formField = $request->all();
        $this->validator($formField)->validate();
        $user = $request->user();

        if ($user) {
            $formField['user_id'] = $user->id;
            $formField['user_name'] = $user->name;
        }

        $formField['slug'] = $this->generateSlug($formField['subject']);

        $this->create($formField);
        return back()->with('status', 'Consulta publicada con exito!');
    }

    /**
     * Get all the last ones topics sorted by date
     *
     * @param bar_id, beer_id or comment_id $reviewedId
     * @return collection of reviews
     */
    public function getLastOnes(Request $request) {
        $topics = $this->getByFilter();

        foreach($topics as $topic) {
            $topic['topic_url'] = '/tema/' . $topic['slug'];
        }

        return view('topics.list', [ 'topics' => $topics ]);
    }

    public function getByFilter() {
        return Topic::all();
    }

    private function generateSlug($subject) {
        $subject = str_replace(" ","-", strtolower($subject));
        $possibleSlug = preg_replace("/[^\-a-z0-9]/","", $subject);
        return $this->validSlug($possibleSlug);
    }

    private function validSlug($possibleSlug) {
        $originalSlug = $possibleSlug;
        // Check if the are a document with this possible slug
        while ( $topic = Topic::where('slug', $possibleSlug)->first() ) {
            $possibleSlug = $originalSlug . '-' . $this->generateRandomString();
        }
        return $possibleSlug;
    }

    // TODO: Move this function to a helper controller
    private function generateRandomString($length = 2) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
