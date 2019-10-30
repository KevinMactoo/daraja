<?php
//$data = file_get_contents['php://input'];

$handle = fopen('validation.txt', 'w');

fwrite($handle , $data);

//$json_decode = json_decode($data);

//$amount = $data['TransAmount'];

/*if ($amount < 5){
  $response = array(
    "ResultCode"=>0 //to accept the payment
   // "ResultDesc"=>"Accepted"
  );

  $json_decode = json_encode($response);

  header('Content-type: application/json');

  echo $json_response;
}*/
 
