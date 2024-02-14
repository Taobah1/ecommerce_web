<?php
session_start();

include_once("includes/dbconn.php");

function redirect($url, $message)
  {
    $_SESSION['message'] = $message;
    header('Location: ' .$url);
    exit;
  }

  function getAll($table){
    global $conn;
    $select_query = " SELECT * FROM $table";
    return $select_result = mysqli_query($conn, $select_query);
  }

  function pagenation($table){
    global $conn;

    $sn = 0;

    $start = 0;

    $rows_per_page = 4;


    $sql = "SELECT * FROM $table";
    $result = mysqli_query($conn, $sql);
    $num_of_rows = mysqli_num_rows($result);

    $pages = ceil($num_of_rows / $rows_per_page);

    if(isset($_GET['page_no'])){
      $page = $_GET['page_no'] - 1;
      $start = $page * $rows_per_page;
      $sn = 5;
    }

    $sql_d = "SELECT * FROM $table LIMIT $start, $rows_per_page";
    $result_d = mysqli_query($conn, $sql_d);
      }
      

  function getById($table, $id){
    global $conn;
    $select_query = " SELECT * FROM $table WHERE id = $id";
    return $select_result = mysqli_query($conn, $select_query);
  }

  function getAllOrders(){
    global $conn;
    $user_id = $_SESSION['auth_user']['id'];
    $select_query = " SELECT * FROM orders";
    return $select_result = mysqli_query($conn, $select_query);
  }

?>