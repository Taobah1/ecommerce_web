<?php
 include_once('../middleware/adminmiddleware.php');

if(isset($_POST['delete_user_btn'])){
  $user_id = $_POST['user_id'];

  $delete_query = "DELETE FROM users WHERE id = $user_id ";
  $result = mysqli_query($conn, $delete_query);

  if($result){

    echo 200;
  }

  else{
    echo 400;
  }
}


?>