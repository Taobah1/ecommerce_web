<?php
// session_start();

function getIpAddress(){
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
     $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
     $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
     $ip = $_SERVER['REMOTE_ADDR'];
}
return $ip;
}


// $_SESSION['user'] = $ip;
if(!isset($_SESSION['user'])){
     $ip = getIpAddress() . rand(1111,9999);
     $_SESSION['user'] = $ip;
}




?>