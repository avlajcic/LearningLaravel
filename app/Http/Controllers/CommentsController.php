<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Http\Requests\CreateCommentRequest;

class CommentsController extends Controller
{
  public function store(CreateCommentRequest $request){
    $comment = new Comment();

    if ($request->input('name') == null)
      $comment->name = "Anonymous";
    else
      $comment->name = $request->input('name');
    $comment->comment = $request->input('comment');
    $comment->article_id = $request->input('article_id');

    error_log($comment);
    $comment->save();
    return $comment;
  }
}
