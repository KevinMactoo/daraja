<?php
$callbackResponse = file_get_contents['php://input'];

$logfile = "callbackResponse.txt";
$log=fopen($logfile,"a");
fwrite($log, $callbackResponse);
fclose($log);

 
