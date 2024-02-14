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

  function getTrending(){
    global $conn;
    $select_query = " SELECT * FROM products WHERE trending = '1' ORDER BY RAND() LIMIT 0,9";
    return $select_result = mysqli_query($conn, $select_query);
  }

  function getSlugActive($table, $slug){
    global $conn;
    $select_query = " SELECT * FROM $table WHERE slug = '$slug' LIMIT 1";
    return $select_result = mysqli_query($conn, $select_query);
  }
  
  function getProductByCat($cat_id){
    global $conn;
    $select_query = " SELECT * FROM products WHERE category_id = $cat_id";
    return $select_result = mysqli_query($conn, $select_query);
  }

  function getCarts(){
    global $conn;
    $user_id = $_SESSION['auth_user']['id'];
    $query = "SELECT c.id AS cid, c.prod_qty, c.prod_id, p.id AS pid, p.name, p.image, p.selling_price FROM carts c,
              products p WHERE c.prod_id = p.id AND c.user_id = '$user_id' ";
              $select = "SELECT * FROM carts ";
    return $result = mysqli_query($conn, $query);
  }

  function totalCarts(){
    global $conn;
    $total_price = 0;
    $user_id = $_SESSION['auth_user']['id'];
    $query = "SELECT c.prod_qty, p.selling_price FROM carts c,
              products p WHERE c.prod_id = p.id AND c.user_id = '$user_id' ";
    $result = mysqli_query($conn, $query);
    $num_of_rows = mysqli_num_rows($result);
    if($num_of_rows > 0){
      while($row=mysqli_fetch_array($result)){
        $price = array($row['selling_price'] * $row['prod_qty']);
        $total = array_sum($price);
        $total_price +=$total;
      }
    }
    echo $total_price;
  }

  function cartsItems(){
    global $conn;
    $user_id = $_SESSION['auth_user']['id'];
    $query = "SELECT c.prod_qty, p.selling_price FROM carts c,
              products p WHERE c.prod_id = p.id AND c.user_id = '$user_id' ";
    $result = mysqli_query($conn, $query);
    $num_of_rows = mysqli_num_rows($result);
    echo $num_of_rows;
  }

  function orders(){
    global $conn;
    $user_id = $_SESSION['auth_user']['id'];
    $select_query = " SELECT * FROM orders WHERE user_id = $user_id";
    return $select_result = mysqli_query($conn, $select_query);
  }

  function search_products($search_data){
    global $conn;
    $sql = "SELECT * FROM products WHERE meta_keywords LIKE '%$search_data%'";
    return $results = mysqli_query($conn, $sql);
    }
    
?>