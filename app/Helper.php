<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Model;

class Helper extends Model
{
    public function generateSlug($subject, $modelName="") {
        if ( ! $modelName) {
            return "";
        }

        $subject = strtolower($subject);
        $subject = $this->replaceLatinCharacters($subject);
        // Remove all characters but 'spaces', ñ, letters and numbers
        $subject = preg_replace("/[^\ ña-z0-9]/", "", $subject);
        $possibleSlug = str_replace(" ","-", trim($subject));
        return $this->validatedSlug($possibleSlug, $modelName);
    }

    private function validatedSlug($possibleSlug, $modelName) {
        $originalSlug = $possibleSlug;
        // Check if the are a document with this possible slug
        while ( $element = $modelName::where('slug', $possibleSlug)->first() ) {
            $possibleSlug = $originalSlug . '-' . $this->generateRandomString();
        }
        return $possibleSlug;
    }

    private function generateRandomString($length = 2) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

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

    public function increaseReviewCounter($elementId, $elementType) {
        $model = "";
        switch ($elementType) {
            case 'bar':
                $model = "App\Bar";
                break;

            case 'beer':
                $model = "App\Beer";
                break;

            case 'topic':
                $model = "App\Topic";
                break;
        }

        if ($model) {
            $model::incrementReviewsCounter($elementId);
        }
    }
}
