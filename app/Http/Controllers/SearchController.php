<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Article;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = Request::get('search');
        if ($search != ' ') {
            $articles = Article::where('Article_Title', 'like', '%' . $search . '%')->paginate(20);
            $i = 1;
            return view('searchResults', compact('articles', 'i', 'search'));
        };
    }
}
