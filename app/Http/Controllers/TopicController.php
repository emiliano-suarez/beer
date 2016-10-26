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
        $subject = strtolower($subject);
        $subject = $this->replaceLatinCharacters($subject);
        // Remove all characters but 'spaces', ñ, letters and numbers
        $subject = preg_replace("/[^\ ña-z0-9]/", "", $subject);
        $possibleSlug = str_replace(" ","-", trim($subject));
        return $this->validatedSlug($possibleSlug);
    }

    private function validatedSlug($possibleSlug) {
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

    // TODO: Move this function to a helper controller
    private function replaceLatinCharacters($string) {
        $string = trim($string);
     
        $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );
     
        $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string
        );
     
        $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string
        );
     
        $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $string
        );
     
        $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string
        );
     
        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C',),
            $string
        );

        return $string;
    }
}
