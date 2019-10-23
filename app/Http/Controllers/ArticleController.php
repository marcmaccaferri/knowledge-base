<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Auth;

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

        return view('index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $article = new Article();
        $article->User_Id = Auth::user()->id;
        $article->Article_Category = $request->input('Article_Category');
        $article->Article_Sub_Category = $request->input('Article_Sub_Category');
        $article->Article_Title = $request->input('Article_Title');
        $article->Article_Body = $request->input('Article_Body');
        */


        $validatedData = $request->validate([
            'User_Id' => 'required|max:255',
            'Article_Category' => 'required|max:255',
            'Article_Sub_Category' => 'required|max:255',
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
        //
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

        return view('edit', compact('article'));
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
            'Article_Category' => 'required|max:255',
            'Article_Sub_Category' => 'required|max:255',
            'Article_Title' => 'required|max:255',
            'Article_Body' => 'required',
        ]);
        Article::whereId($id)->update($validatedData);

        return redirect('/articles')->with('success', 'Article has been successfully updated');
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
