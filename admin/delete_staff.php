<?php
 include_once('../middleware/adminmiddleware.php');

if(isset($_POST['delete_staff_btn'])){
  $staff_id = $_POST['staff_id'];

  $delete_query = "DELETE FROM staffs WHERE id = $staff_id ";
  $result = mysqli_query($conn, $delete_query);

  if($result){

    echo 200;
  }

  else{
    echo 400;
  }
}


?>