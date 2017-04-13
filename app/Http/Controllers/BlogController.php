<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Article;

class BlogController extends Controller
{
    public function index(){
      $articles = Article::orderBy('id', 'desc')->take(3)->get();
      return view('blog/mainPage', ['articles' => $articles]);
    }

    public function new(){
      return view('blog/writePost');
    }

    public function show($id){
      $article = Article::find($id);
      return view('blog/showPost', ['article' => $article]);
    }

    public function store(Request $request){
      $input = $request->all();
      Article::create($input);
      return redirect('/blog');
    }
}
