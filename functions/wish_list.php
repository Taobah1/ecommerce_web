<?php
session_start();
include_once('../includes/dbconn.php');
include_once("../user_ip.php");

  if(isset($_POST['scope'])){

    $scope = $_POST['scope'];

    switch ($scope)
    {
      case "add":
        $pid = $_POST['pid'];

        if(isset($_SESSION['auth'])){
          $user_id = $_SESSION['auth_user']['id'];
          $sql = "SELECT * FROM wish_list WHERE prod_id = '$pid' AND user_id = '$user_id'";
          $result = mysqli_query($conn, $sql);
          $nor = mysqli_num_rows($result);
        
          if($nor > 0){
            echo 202;
          }
          else{
            $select = "SELECT * FROM users WHERE id = '$user_id'";
            $select_res = mysqli_query($conn, $select);
            $row = mysqli_fetch_assoc($select_res);
            $user = $row['user_ip'];
        
            $insert = "INSERT INTO wish_list (user_ip, user_id, prod_id) VALUES ('$user', '$user_id', '$pid')";
            $insert_res = mysqli_query($conn, $insert);
            
            if($insert_res){
              echo 201;
            }
            else{
              echo 401;
            }
          }
        }
        else{
          $user_ip = $_SESSION['user'];
          $sql_s = "SELECT * FROM wish_list WHERE prod_id = '$pid' AND user_ip = '$user_ip'";
          $result_s = mysqli_query($conn, $sql_s);
          $nor = mysqli_num_rows($result_s);
        
          if($nor > 0){
            echo 202;
          }
          else{
        
            $insert = "INSERT INTO wish_list (user_ip, prod_id) VALUES ('$user_ip', '$pid')";
            $insert_res = mysqli_query($conn, $insert);
            
            if($insert_res){
              echo 201;
            }
            else{
              echo 401;
            }
          }
        }

        break;

        case "delete":

          $wish_id = $_POST['wish_id'];

          if(isset($_SESSION['auth'])){
            $user_id = $_SESSION['auth_user']['id'];
    
            $select_query = "SELECT * FROM wish_list WHERE id = '$wish_id' AND user_id = '$user_id'";
            $result = mysqli_query($conn, $select_query);
    
            $num_of_rows = mysqli_num_rows($result);
            if($num_of_rows > 0){
              $delete_query = "DELETE FROM wish_list WHERE id = '$wish_id' AND user_id = '$user_id'";
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
          $user_ip = $_SESSION['user'];
  
          $select_query = "SELECT * FROM wish_list WHERE id = '$wish_id' AND user_ip = '$user_ip'";
          $result = mysqli_query($conn, $select_query);
  
          $num_of_rows = mysqli_num_rows($result);
          if($num_of_rows > 0){
            $delete_query = "DELETE FROM wish_list WHERE id = '$wish_id' AND user_ip = '$user_ip'";
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


  ?>