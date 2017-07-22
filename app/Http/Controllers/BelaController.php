<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Player;
use DB;

class BelaController extends Controller
{
    public function players(){
      $players = Player::all();
      foreach ($players as  $player) {
        if ($player->pointsWon + $player->pointsLost == 0){
          $player->percent= 0.85;
        }
        else{
        $player->percent = round(100*(double)($player->pointsWon / ( $player->pointsWon + $player->pointsLost)),2);
        }
      }
      $playersArray = $players->toArray();

      usort($playersArray, function($first, $second) {
          return $second['percent'] - $first['percent'];
      });

      return json_encode($playersArray);
    }

}
