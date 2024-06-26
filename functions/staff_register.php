<?php
include_once('../includes/dbconn.php');


  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPass']);
  $role = mysqli_real_escape_string($conn, $_POST['role_as']);

 

$hasError = false;
$errorBag = [];


if(trim($name)==''){
  $errorBag['name'] = "This field is required";
  $hasError = true;
}

if(trim($email)==''){
  $errorBag['email'] = "This field is required";
  $hasError = true;
}

if(trim($phone)==''){
  $errorBag['phone'] = "This field is required";
  $hasError = true;
}

if(trim($password)==''){
  $errorBag['password'] = "This field is required";
  $hasError = true;
}

if(trim($confirmPassword)==''){
  $errorBag['confirmPass'] = "This field is required";
  $hasError = true;
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errorBag['validemail'] = "Email is not Valid";
  $hasError = true; 
}

if($password !== $confirmPassword){
  $errorBag['invalidpassword'] = "Password not the same";
  $hasError = true;
}

else{
  if($password === $confirmPassword){

    $sql_select = "SELECT * FROM staffs WHERE email = '$email'";
    $result = mysqli_query($conn, $sql_select);
    $num_of_rows = mysqli_num_rows($result);
    if($num_of_rows > 0){
      $errorBag['exist'] = "Email already exist";
      $hasError = true;
    }
  }
}

    if($hasError){
  return response(400, $errorBag, false);
}

    $sql_insert = "INSERT INTO staffs (name, email, phone, password, role_as) 
VALUES ('$name', '$email', '$phone', '$password', '$role')";

if($conn->query($sql_insert) === true){
  $messages = [
    'status' => 201,
    'message' => 'Inserted Successfully',
    'successful' => true
  ];
  return response(201, $messages, true);

}
  else{
    $errorMessage = ["message" => "There was an error inserting your record" . $conn->error];
    return response(401, $errorMessage, false );
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