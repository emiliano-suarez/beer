<?php

namespace App\Http\Controllers;

use App\Bar;
use Illuminate\Http\Request;

class BarController extends Controller
{
    public function showList(Request $request)
    {
        $tags = ($request->tags ? $request->tags : array());
        $searchText = ($request->search ? $request->search : '');

        if (count($tags) || strlen($searchText)) {
            $barResults = Bar::whereIn('tags', $tags)->orWhere(function($query)
                    {
                        $query->where('name', 'like', '%{$searchText}%')
                              ->where('description',  'like', '%{$searchText}%%');
                    })
                    ->get();
        }
        else {
            $barResults = Bar::all();
        }

        $bars = $barResults->all();

        return view('bars.list', [ 'bars' => $bars ]);
    }
}
