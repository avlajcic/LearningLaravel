<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Article;
use DB;

class BelaController extends Controller
{
    public function test(){
      $test = Article::all();
      return $test;
    }

}
