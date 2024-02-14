<?php
include_once('../includes/dbconn.php');

  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $role = mysqli_real_escape_string($conn, $_POST['role']);

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

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errorBag['validemail'] = "Email is not Valid";
  $hasError = true; 
}

    if($hasError){
  return response(400, $errorBag, false);
}

    $sql_update = "UPDATE staffs SET name = '$name', email = '$email', password = '$password', role_as = '$role' WHERE id = $id";
    $result = mysqli_query($conn, $sql_update);

if($sql_update){
  $messages = [
    'status' => 201,
    'message' => 'Updated Successfully',
    'successful' => true
  ];
  return response(201, $messages, true);

}
  else{
    $errorMessage = ["message" => "There was an error Updating your record" . $conn->error];
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