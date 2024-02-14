<?php
// session_start();
include_once("functions.php");
include_once('../includes/dbconn.php');


$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$_SESSION['error'] = [];
$isError = false;

if(trim($email)==''){
  $_SESSION['error']['email'] = "This field is required";
  $isError = true;
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $_SESSION['error']['validemail'] = "Email is not Valid";
  $isError = true; 
}

if(trim($password)==''){
  $_SESSION['error']['password'] = "This field is required";
  $isError = true;
}

if($isError){
  header("Location: ../login.php?message");
}

else{
  $sql_login = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
  $result_login = mysqli_query($conn, $sql_login);

  $num_of_rows = mysqli_num_rows($result_login);

  if($num_of_rows > 0){
    $_SESSION['auth'] = true;

    $userdata = mysqli_fetch_assoc($result_login);
    $userid = $userdata['id'];
    $username = $userdata['name'];
    $useremail = $userdata['email'];
    $role_as = $userdata['role_as'];

    $_SESSION['auth_user'] = [
      "id" => $userid,
      "name" => $username,
      "email" => $useremail
    ];

    $_SESSION['role_as'] = $role_as;

    if($role_as == 1){

      redirect("../admin/index.php", "Welcome to Dashbord");
      // $_SESSION['successful'] = "Welcome to Dashbord";
      // header('Location: ../admin/index.php');
    }

    else{
      redirect("../index.php", "Logged in successfully");
      // $_SESSION['successful'] = "Logged in successfully";
      // header('Location: ../index.php');
    }

  }

  else{
    redirect("../login.php", "Email or Password not correct");
    // $_SESSION['error'] = "Email or Password not correct";
    // header('Location: ../login.php');
  }

  
}

?>