<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Article.php;
use DB;

class BelaController extends Controller
{
    public function test(){
      $test = Article::all();
      return $test;
    }

}
