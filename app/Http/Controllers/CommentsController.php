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
    $comment->post_id = $request->input('post_id');
    
    $comment->save();
    return $comment;
  }
}
