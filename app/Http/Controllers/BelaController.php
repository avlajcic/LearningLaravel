<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use User.php;
use DB;

class BelaController extends Controller
{
    public function test(){
      $users = User::all();
      return $users;
    }

}
