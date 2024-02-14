<?php
include_once('../middleware/adminmiddleware.php');

if(isset($_POST['update_order'])){
  $id = $_POST['id'];
  $status = $_POST['order_status'];

  $pudate_query = "UPDATE orders SET status = '$status' WHERE tracking_id = '$id'";
  $update_res = mysqli_query($conn, $pudate_query);
  if($update_res){
    
    redirect("view-order.php?tracking=$id", "Order Updated Successfuly");
  }

}


?>