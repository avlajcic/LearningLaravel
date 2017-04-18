<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UhpController extends Controller
{
  public function index(){
    return view('uhp/uhp');
  }

  public function solve(Request $request){
    $json = json_decode(html_entity_decode($request->input('jsonData')), true);
    if ($json == null) return "JSON is not valid";

    //Get info about array and create new indexed array that will help sort rest of $json
    $keys = array_keys($json);
    $firstRow = $json[$keys[0]];
    $firstRowSize = count($firstRow);
    $indexedArray = $this->createNewArray($firstRowSize);

    //Sort both first row and indexed array
    for ($i=0; $i<$firstRowSize; $i++) {
        for ($j=0; $j<$firstRowSize-1-$i; $j++) {
            if ($firstRow[$j+1] < $firstRow[$j]) {
                $temp = $firstRow[$j];
                $firstRow[$j]=$firstRow[$j+1];
                $firstRow[$j+1] = $temp;

                $temp = $indexedArray[$j];
                $indexedArray[$j]=$indexedArray[$j+1];
                $indexedArray[$j+1] = $temp;
            }
        }
    }

    //Switch all the rows in $json with help from indexed array
    $copyOfJson = $json;
    $rowCounter = 0;
    foreach ($json as &$row) {
      for ($i=0; $i < $firstRowSize; $i++) {
        //current element = $copyOfJson[sameRow][otherCollum (depending on indexed array)]
        $row[$i] = $copyOfJson[$keys[$rowCounter]][$indexedArray[$i]];
      }
      $rowCounter++;
    }
    unset($row);

    //Finding the maximum value, first setting to first element in second row just so we can have some reference
    $maxValue = $json[$keys[1]][0];
    for ($i=1; $i < $firstRowSize; $i++) {
      for ($j=0; $j < count($json); $j++) {
            if($json[$keys[$i]][$j] > $maxValue){
              $maxValue = $json[$keys[$i]][$j];
          }
      }
    }

    /*
    * Finding all occurrences of maximum element and then summing their coordinates
    * +2 because task specifies coordinates start at 1, 1.
    * Also, i is starting from 1 because first row is only used in sorting.
    */
    $sumOfCoordinates = 0;
    for ($i=1; $i < $firstRowSize; $i++) {
      for ($j=0; $j < count($json); $j++) {
            if($json[$keys[$i]][$j] == $maxValue){
            $sumOfCoordinates+=$i+$j+2;
          }
      }
    }
    //return view('uhp/uhp', ['solution' => $sumOfCoordinates]);
    return $sumOfCoordinates;
  }

  public function createNewArray($size){
    $array = array();
    for ($i=0; $i < $size; $i++) {
      $array[$i] = $i;
    }
    return $array;
  }
}
