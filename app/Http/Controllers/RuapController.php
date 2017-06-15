<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class RuapController extends Controller
{
  public function index(){
    return view('ruap/mainPage');
  }

  public function predict(Request $request){

    $sex = $request->gender;
    $age = $request->age;
    $address = $request->address;
    $famsize = $request->famsize;
    $medu = $request->medu;
    $fedu = $request->fedu;
    $reason = $request->reason;
    $studytime = $request->studytime;
    $paid = $request->paid;
    $higher = $request->higher;
    $freetime = $request->freetime;
    $goout = $request->goout;
    $dalc = $request->dalc;
    $walc = $request->walc;
    $absences = $request->absences;
    $g1 = $this->getPointsFromGrade($request->g1);
    $g2 =$this->getPointsFromGrade($request->g2);

    $data = array(
      'Inputs'=> array(
          'input1'=> array(
              'ColumnNames' => array("sex", "age", "address", "famsize", "Medu", "Fedu", "reason", "studytime", "paid",
                                      "higher", "freetime", "goout", "Dalc", "Walc", "absences", "G1", "G2", "G3"),
              'Values' => array( array($sex, $age, $address, $famsize, $medu, $fedu, $reason, $studytime, $paid,
                                      $higher, $freetime, $goout, $dalc, $walc, $absences, $g1, $g2,"0"))
          ),
      ),
      'GlobalParameters'=> null
    );

    $body = json_encode($data);

    $url = 'https://ussouthcentral.services.azureml.net/workspaces/58dfee3b4c954a9aaa4fcb68195e12fc/services/14ab4d3a24ba4d96a65eab6b9025862a/execute?api-version=2.0&details=true';
    $api_key = 'ZcqR4FVvCKuHotjnin2Fgvf/qXxK8YsaTJP8x6bBm/leX6bgfpDtSnXmlZJREweCrbFu4yVlnK+7Fj98bySsqg==';
    $headers = array('Content-Type: application/json', 'Authorization:Bearer ' . $api_key, 'Content-Length: ' . strlen($body));

    $this->responseArray['body'] = $body;


    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);


    $result = curl_exec($curl);
    $predictedValue = (double)json_decode($result)->Results->output1->value->Values[0][0];
    return "Your predicted number of points is: ".number_format($predictedValue, 2)." (out of 20).";
  }

  public function getPointsFromGrade($grade){
    $grade = (double)$grade;

    if($grade < 1.01){
      $points = 0;
    }
    else if ($grade > 1 and $grade <= 1.1){
      $points = 1;
    }
    else if ($grade > 1.1 and $grade <= 1.2){
      $points = 2;
    }
    else if ($grade > 1.2 and $grade <= 1.3){
      $points = 3;
    }
    else if ($grade > 1.3 and $grade <= 1.4){
      $points = 4;
    }
    else if ($grade > 1.4 and $grade <= 1.5){
      $points = 5;
    }
    else if ($grade > 1.5 and $grade <= 1.6){
      $points = 6;
    }
    else if ($grade > 1.6 and $grade <= 1.7){
      $points = 7;
    }
    else if ($grade > 1.7 and $grade <= 1.8){
      $points = 8;
    }
    else if ($grade > 1.8 and $grade <= 1.9){
      $points = 9;
    }
    else if ($grade > 1.9 and $grade <= 2){
      $points = 10;
    }
    else if ($grade > 2 and $grade <= 2.24){
      $points = 11;
    }
    else if ($grade > 2.24 and $grade <= 2.49){
      $points = 12;
    }
    else if ($grade > 2.49 and $grade <= 2.83){
      $points = 13;
    }
    else if ($grade > 2.83 and $grade <= 3.17){
      $points = 14;
    }
    else if ($grade > 3.17 and $grade <= 3.49){
      $points = 15;
    }
    else if ($grade > 3.49 and $grade <= 3.99){
      $points = 16;
    }
    else if ($grade > 3.99 and $grade <= 4.49){
      $points = 17;
    }
    else if ($grade > 4.49 and $grade <= 4.74){
      $points = 18;
    }
    else if ($grade > 4.74 and $grade <= 4.99){
      $points = 19;
    }
    else{
      $points = 20;
    }
    return $points;
  }
}
