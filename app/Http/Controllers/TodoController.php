<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;
use App\Http\Requests\CreateTaskRequest;
use Auth;

class TodoController extends Controller
{
  public function index(){
    if (Auth::check()){
      $tasks = Task::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
      return view('todo/mainPage', ['tasks' => $tasks]);
    }
    else
      return view('todo/mainPage');
  }
  public function store(CreateTaskRequest $request){
    $input = $request->all();
    Task::create($input);
    return redirect()->route('todoIndex');
  }
}
