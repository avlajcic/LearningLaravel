<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RuapController extends Controller
{
  public function index(){
    return view('ruap/mainPage');
  }
}
