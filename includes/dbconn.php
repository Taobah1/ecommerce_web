<?php
$host = "localhost";
$user = "root";
$pwd = "root";
$dbn = "ecom_web";


$conn = new mysqli ($host, $user, $pwd, $dbn);

if(!$conn){
  die("Connection Failed" . mysqli_connect_error());
}

?>