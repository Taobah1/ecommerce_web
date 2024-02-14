<?php
// session_start();

include_once('functions/functions.php');

if(isset($_SESSION['auth'])){
  unset($_SESSION['auth']);
  unset($_SESSION['auth_user']);

    redirect("index.php", "Logged out successfully");
}

header("Location: index.php");






?>