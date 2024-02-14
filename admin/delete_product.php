<?php
// session_start();
 include_once('../middleware/adminmiddleware.php');

// if(isset($_POST['delete_product_btn'])){
  $category_id = $_POST['product_id'];

  $select_query= "SELECT * FROM products WHERE id = $category_id";
  $select_result = mysqli_query($conn, $select_query);
  $rows = mysqli_fetch_assoc($select_result);

  $image = $rows['image'];
  
  $delete_query = "DELETE FROM products WHERE id = $category_id ";
  $result = mysqli_query($conn, $delete_query);

  if($result){

    if(file_exists($image)){
      unlink($image);
    }
    echo 200;

    // redirect("all_products.php", "Deleted from Products");
  }

  else{
    echo 400;
    // echo "there was an error deleteing this product" . mysqli_error();
  }
// }


?>