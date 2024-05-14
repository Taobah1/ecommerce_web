<?php
session_start();

include_once("../includes/dbconn.php");
include_once("../user_ip.php");
// $user_ip = $_SESSION['user'];
// echo $user_ip;
        // exit;

// if(isset($_SESSION['auth'])){

  if(isset($_POST['scope'])){

    $scope = $_POST['scope'];
    switch ($scope)
    {
      case "add":
        $pid = $_POST['pid'];
        $qty = $_POST['qty'];

        if(isset($_SESSION['auth'])){

          $user_id = $_SESSION['auth_user']['id'];
        $user_ip = $_SESSION['user'];
        

        $select = "SELECT * FROM carts WHERE prod_id = '$pid' AND user_id = '$user_id'";
        // $select = "SELECT * FROM carts WHERE prod_id = '$pid' AND user_ip = '$user_ip'";
        $result = mysqli_query($conn, $select);

        $num_of_row = mysqli_num_rows($result);
        if($num_of_row > 0){
            echo 202;
        }

        else{
          $select_cart = "SELECT * FROM users WHERE id = $user_id";
          $result_cart = mysqli_query($conn, $select_cart);
          $nor = mysqli_fetch_assoc($result_cart);
          $user = $nor['user_ip'];
          // $insert = "INSERT INTO carts (user_id, prod_id, prod_qty) VALUES 
          // ('$user_id', '$pid', '$qty')";
          $insert = "INSERT INTO carts (user_ip, user_id, prod_id, prod_qty) VALUES 
          ('$user', '$user_id', $pid, $qty)";
          $query = mysqli_query($conn, $insert);
  
          if($query){
            echo 201;
          }
          else{
            echo 501;
          }

        }
        }
        else{
        // $user_id = $_SESSION['auth_user']['id'];
        $user_ip = $_SESSION['user'];
        

        $select = "SELECT * FROM carts WHERE prod_id = '$pid' AND user_ip = '$user_ip'";
        // $select = "SELECT * FROM carts WHERE prod_id = '$pid' AND user_ip = '$user_ip'";
        $result = mysqli_query($conn, $select);

        $num_of_row = mysqli_num_rows($result);
        if($num_of_row > 0){
            echo 202;
        }

        else{
          // $insert = "INSERT INTO carts (user_id, prod_id, prod_qty) VALUES 
          // ('$user_id', '$pid', '$qty')";
          $insert = "INSERT INTO carts (user_ip, prod_id, prod_qty) VALUES 
          ('$user_ip', $pid, $qty)";
          $query = mysqli_query($conn, $insert);
  
          if($query){
            echo 201;
          }
          else{
            echo 501;
          }

        }
      }
  
          break;

          case "update":
            if(isset($_SESSION['auth'])){
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
            }
            else{
              $user_ip = $_SESSION['user'];
            $prod_qty = $_POST['prod_qty'];
            $prod_id = $_POST['prod_id'];
            // $user_id = $_SESSION['auth_user']['id'];
            $user_ip = $_SESSION['user'];
            
    
            $select_query = "SELECT * FROM carts WHERE prod_id = '$prod_id' AND user_ip = '$user_ip'";
            $result = mysqli_query($conn, $select_query);
    
            $num_of_row = mysqli_num_rows($result);
            if($num_of_row > 0){
              $update_query = "UPDATE carts SET prod_qty = $prod_qty WHERE prod_id = '$prod_id' AND user_ip = '$user_ip'";
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
          }

            break;

            case "delete":
              if(isset($_SESSION['auth'])){
                $cart_id = $_POST['cart_id'];
                $user_id = $_SESSION['auth_user']['id'];
        
                $select_query = "SELECT * FROM carts WHERE id = '$cart_id' AND user_id = '$user_id'";
                $result = mysqli_query($conn, $select_query);
        
                $num_of_rows = mysqli_num_rows($result);
                if($num_of_rows > 0){
                  $delete_query = "DELETE FROM carts WHERE id = '$cart_id' AND user_id = '$user_id'";
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
              }
              else{
              $cart_id = $_POST['cart_id'];
              $user_ip = $_SESSION['user'];
      
              $select_query = "SELECT * FROM carts WHERE id = '$cart_id' AND user_ip = '$user_ip'";
              $result = mysqli_query($conn, $select_query);
      
              $num_of_rows = mysqli_num_rows($result);
              if($num_of_rows > 0){
                $delete_query = "DELETE FROM carts WHERE id = '$cart_id' AND user_ip = '$user_ip'";
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
            }
  
              break;
  
          default:
               echo 500;
    }
  }
// }
// else{
//   echo 401;
// }





?>