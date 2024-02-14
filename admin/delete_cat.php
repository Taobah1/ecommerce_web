<?php
// session_start();
 include_once('../middleware/adminmiddleware.php');

// if(isset($_POST['delete_cat_btn'])){
  $category_id = $_POST['category_id'];

  $select_query= "SELECT * FROM categories WHERE id = $category_id";
  $select_result = mysqli_query($conn, $select_query);
  $rows = mysqli_fetch_assoc($select_result);

  $image = $rows['image'];
  
  $delete_query = "DELETE FROM categories WHERE id = $category_id ";
  $result = mysqli_query($conn, $delete_query);

  if($result){

    if(file_exists($image)){
      unlink($image);
    }

    echo 200;
    // redirect("all_cat.php", "Deleted from Categories");
  }

  else{
    echo 400;
    // echo "there was an error deleteing this category" . mysqli_error();
  }
// }


?>