<?php

namespace App\Http\Controllers;

use App\Beer;
use Validator;
use Illuminate\Http\Request;

class BeerController extends Controller
{
	public function showList(Request $request)
	    {
	        $tags = ($request->tags ? $request->tags : array());
	        $searchText = ($request->search ? $request->search : '');

	        if (count($tags) || strlen($searchText)) {
	            $barResults = Beer::whereIn('tags', $tags)->orWhere(function($query)
	                    {
	                        $query->where('name', 'like', '%{$searchText}%')
	                              ->where('description',  'like', '%{$searchText}%%');
	                    })
	                    ->get();
	        }
	        else {
	            $beerResults = Beer::all();
	        }

	        $beers = $beerResults->all();

	        return view('beers.list', [ 'beers' => $beers ]);
	    }

}
