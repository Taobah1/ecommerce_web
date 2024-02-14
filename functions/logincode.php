<?php
session_start();
include_once('../includes/dbconn.php');

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$errorBag = [];
$isError = false;

if(trim($email)==''){
  $errorBag['email'] = "This field is required";
  $isError = true;
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errorBag['validemail'] = "Email is not Valid";
  $isError = true; 
}

if(trim($password)==''){
  $errorBag['password'] = "This field is required";
  $isError = true;
}

if($isError){
  return response(400, $errorBag, false);
}

else{
  $sql_login = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
  $result_login = mysqli_query($conn, $sql_login);

  $num_of_rows = mysqli_num_rows($result_login);

  if($num_of_rows > 0){
    // $_SESSION['auth'] = true;

    // $userdata = mysqli_fetch_assoc($result_login);
    // $username = $userdata['name'];

    // $_SESSION['auth_user'] = [
      // "name" = $username;
    // ]
    return response(201, "Success", true);
  }

  else{
    $message = [];
    $message['error'] = "Email or Password not correct";
    return response(401, $message, false);
  }

  
}

function response($statusCode, $errors, $status)
{
  header('Content-Type: applications/json; charset=utf-8');
  http_response_code($statusCode);
  echo json_encode($errors);
  return $status;
  exit;
}

?>