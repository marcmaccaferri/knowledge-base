<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Auth;
use App\Category;
use App\User;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        $categories = Category::all();

        return view('/articles/index', compact('articles', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('/articles/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'User_Id' => 'required|max:255',
            'category_id' => 'required|max:2',
            'Article_Title' => 'required|max:255',
            'Article_Body' => 'required',
        ]);
        $article = Article::create($validatedData);

        return redirect('/articles')->with('success', 'Article has been successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        $user = User::where('id', $article->User_Id)->first();

        return view('/articles/show', compact('article', 'categories', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();

        return view('/articles/edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'User_Id' => 'required|max:255',
            'category_id' => 'required|max:2',
            'Article_Title' => 'required|max:255',
            'Article_Body' => 'required',
        ]);
        Article::whereId($id)->update($validatedData);

        return redirect('/articles', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect('/articles')->with('success', 'Article has been successfully deleted');
    }
}
