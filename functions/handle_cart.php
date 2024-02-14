<?php
session_start();

include_once("../includes/dbconn.php");

if(isset($_SESSION['auth'])){

  if(isset($_POST['scope'])){

    $scope = $_POST['scope'];
    switch ($scope)
    {
      case "add":
        $pid = $_POST['pid'];
        $qty = $_POST['qty'];
        $user_id = $_SESSION['auth_user']['id'];

        $select = "SELECT * FROM carts WHERE prod_id = '$pid' AND user_id = '$user_id'";
        $result = mysqli_query($conn, $select);

        $num_of_row = mysqli_num_rows($result);
        if($num_of_row > 0){
            echo 202;
        }

        else{
          $insert = "INSERT INTO carts (user_id, prod_id, prod_qty) VALUES 
          ('$user_id', '$pid', '$qty')";
          $query = mysqli_query($conn, $insert);
  
          if($query){
            echo 201;
          }
          else{
            echo 501;
          }

        }
  
          break;

          case "update":
            $prod_qty = $_POST['prod_qty'];
            $prod_id = $_POST['prod_id'];
            $user_id = $_SESSION['auth_user']['id'];
    
            $select_query = "SELECT * FROM carts WHERE prod_id = '$prod_id' AND user_id = '$user_id'";
            $result = mysqli_query($conn, $select_query);
    
            $num_of_row = mysqli_num_rows($result);
            if($num_of_row > 0){
              $update_query = "UPDATE carts SET prod_qty = $prod_qty WHERE prod_id = '$prod_id' AND user_id = '$user_id'";
              $result_query = mysqli_query($conn, $update_query);

              if($result_query){
                echo 203;
              }
              else{
                echo 401;
              }
            }
            else{
              echo 501;
            }

            break;

            case "delete":
              $cart_id = $_POST['cart_id'];
              $user_id = $_SESSION['auth_user']['id'];
      
              $select_query = "SELECT * FROM carts WHERE id = '$cart_id' AND user_id = '$user_id'";
              $result = mysqli_query($conn, $select_query);
      
              $num_of_rows = mysqli_num_rows($result);
              if($num_of_rows > 0){
                $delete_query = "DELETE FROM carts WHERE id = '$cart_id'";
                $result_query_del = mysqli_query($conn, $delete_query);
  
                if($result_query_del){
                  echo 202;
                }
                else{
                  echo 402;
                }
              }
              else{
                echo 502;
              }
  
              break;
  
          default:
               echo 500;
    }
  }
}
else{
  echo 401;
}




?>