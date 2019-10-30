<?php
require_once 'functions.php';

//echo generateToken();

  // echo registerURL();

   echo simulateC2B(1000, '254708374149');

//thats our access token

//validation url is used for validation purposes e.g to check if th amount payed is what was expected, correct acc number etc.....
//.......upon validation, you now accept the transaction by responding to the api telling it to accept or reject the payment
//confirmation url is where the data is dumped upon a successful transaction
//upon validation respond with 0 to accept and 1 to reject
 ?>
