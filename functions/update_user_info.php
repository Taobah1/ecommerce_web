<?php
include_once('../includes/dbconn.php');

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$message = [];
$hasError = false;

if(trim($name) == ''){
  $message['name'] = "This filed is required";
  $hasError = true;
}

if(trim($email) == ''){
  $message['email'] = "This feild is required";
  $hasError = true;
}

if(trim($phone) == ''){
  $message['phone'] = "This fied is required";
  $hasError = true;
}

if(trim($address) == ''){
  $message['address'] = "This fied is required";
  $hasError = true;
}

if($hasError){
  response(400, $message, false);
}

else{
  $sql = "UPDATE users SET name = '$name', email = '$email', phone = '$phone', address = '$address' WHERE id = $id";
  $result = mysqli_query($conn, $sql);

  if($result){
    // echo "success";
    response(200, "Success", true);
  }
  else{
    // echo "error" . $conn->error;
    response(400, "Error in Processing" . $conn->error, false);
  }
}


function response($statusCode, $message, $status)
{
  header('Content-Type: applications/json; charset=utf-8');
  http_response_code($statusCode);
  echo json_encode($message);
  return $status;
  exit;
}
?>