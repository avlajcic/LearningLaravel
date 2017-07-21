<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Player;
use DB;

class BelaController extends Controller
{
    public function players(){
      $players = Player::all();
      return $players;
    }

}
