<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
      return view('blog/mainPage');
    }

    public function new(){
      return view('blog/writePost');
    }
}
