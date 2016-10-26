<?php

namespace App\Http\Controllers;

use App\Topic;
use App\Helper;
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

        $modelName = Topic::getClassName();
        $helper = new Helper();
        $formField['slug'] = $helper->generateSlug($formField['subject'], $modelName);

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
}
