<?php


//access token

 function generateToken()
 {
  //code on the deveoperas portal


  $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $access_token_url);
  $credentials = base64_encode('IVtMZyP2JWhKDpeX4f8P2dg29pajGusO:lZhStq1WxypsgPwa');//consumer key and secret replaced
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

  $curl_response = curl_exec($curl);

  $json_decode = json_decode($curl_response);

  $access_token = $json_decode->access_token;

  return $access_token;

 }



//initiating transaction

//define the variables we will be using
 $initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

 $BusinessShortCode ='174379';
date_default_timezone_set('Africa/Nairobi');

 $Timestamp = date('ymdGis');
 $PartyA ='254795291230';
 $CallBackURL='https://safaricomapi.000webhostapp.com/daraja/callback_url.php';
 $AccountReference='Trean sachool';//can be your invoice number or cart number
 $TransactionDesc='Payment for Mac Developments';
 $Amount='1';
 $Passkey='bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
 $Password= base64_encode($BusinessShortCode.$Passkey.$Timestamp);

 $curl = curl_init();
 curl_setopt($curl, CURLOPT_URL,  $initiate_url );
 curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.generateToken())); //setting custom header


 $curl_post_data = array(
   //Fill in the request parameters with valid values
   'BusinessShortCode' => $BusinessShortCode,
   'Password' => $Password,
   'Timestamp' => $Timestamp,
   'TransactionType' => 'CustomerPayBillOnline',
   'Amount' => $Amount,
   'PartyA' => $PartyA,
   'PartyB' => $BusinessShortCode,
   'PhoneNumber' => $PartyA,
   'CallBackURL' => $CallBackURL,
   'AccountReference' =>  $AccountReference,
   'TransactionDesc' => $TransactionDesc
 );

 $data_string = json_encode($curl_post_data);

 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($curl, CURLOPT_POST, true);
 curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

 $curl_response = curl_exec($curl);
 print_r($curl_response);

 echo $curl_response;
 ?>
