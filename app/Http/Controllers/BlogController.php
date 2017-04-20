<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Article;
use App\Comment;
use App\Http\Requests\CreateArticleRequest;
use DB;

class BlogController extends Controller
{
    public function index(){
      $articles = Article::orderBy('id', 'desc')->paginate(3);
      return view('blog/mainPage', ['articles' => $articles]);
    }

    public function new(){
      return view('blog/writePost');
    }

    public function show($id){
      $article = Article::find($id);
      $comments = Comment::where('article_id', $id)->orderBy('id', 'desc')->get();
      return view('blog/showPost', ['article' => $article, 'comments' => $comments]);
    }

    public function store(CreateArticleRequest $request){
      $input = $request->all();
      Article::create($input);
      return redirect('/blog');
    }

    public function destroy($id){
      $comments = Article::find($id)->comments;
      foreach ($comments as $comment) {
        Comment::destroy($comment->id);
      }
      Article::destroy($id);
      return redirect('/blog');
    }

    public function search(Request $request){
      $requestInfo = $request->all();
      $text = $requestInfo['searchtext'];
      $articles= Article::where('title', 'ILIKE', '%'.$requestInfo['searchtext'].'%')->get();

      return view('blog/searchPage', ['articles' => $articles]);

    }
}
