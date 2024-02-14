<?php
session_start();
include_once('../includes/dbconn.php');


  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $totalPrice = mysqli_real_escape_string($conn, $_POST['totalprice']);
  $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);
  $payment_id = mysqli_real_escape_string($conn, $_POST['payment_id']);
 

$hasError = false;
$errorBag = [];


if(trim($name)==''){
  $errorBag['name'] = "This field is required";
  $hasError = true;
}

if(trim($email)==''){
  $errorBag['email'] = "This field is required";
  $hasError = true;
}

if(trim($phone)==''){
  $errorBag['phone'] = "This field is required";
  $hasError = true;
}

if(trim($pincode)==''){
  $errorBag['pincode'] = "This field is required";
  $hasError = true;
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errorBag['validemail'] = "Email is not Valid";
  $hasError = true; 
}

if(trim($address)==''){
  $errorBag['address'] = "This field is required";
  $hasError = true;
}

if($hasError){
  return response(400, $errorBag, false);
}

else{
  // return response(200, $name, true);
  $user_id = $_SESSION['auth_user']['id'];
  $tracking_id = "taob". rand(100,999) . substr($phone,2);
  $insert = "INSERT INTO orders (tracking_id, user_id, name, email, phone, address, pincode, total_price, payment_mode, payment_id) 
              VALUES ('$tracking_id', '$user_id', '$name', '$email', '$phone', '$address', '$pincode', '$totalPrice', '$payment_mode', '$payment_id')";
  $result = mysqli_query($conn, $insert);
  $order_id = mysqli_insert_id($conn);

  if($result){
    // return response(200, "Success", true);

    $query = "SELECT c.id AS cid, c.prod_qty, c.prod_id, p.id AS pid, p.name, p.image, p.selling_price FROM carts c,
    products p WHERE c.prod_id = p.id AND c.user_id = '$user_id' ";
    $result_q = mysqli_query($conn, $query);
    $nor = mysqli_num_rows($result_q);
    if($nor > 0){

      foreach($result_q as $row){
        $price = $row['selling_price'];
        $qty_ordered = $row['prod_qty'];
        $prod_id = $row['prod_id'];

          $insert_order = "INSERT INTO order_items (order_id, prod_id, qty, price) VALUES ($order_id, $prod_id, $qty_ordered, $price)";
          $result_order = mysqli_query($conn, $insert_order);

          $product_query = "SELECT * FROM products WHERE id = $prod_id LIMIT 1";
          $res_prod = mysqli_query($conn, $product_query);

          $row = mysqli_fetch_assoc($res_prod);
          $current_qty = $row['qty'];
          if(mysqli_num_rows($res_prod)){
            $new_qty = $current_qty - $qty_ordered;
            $update_prod = "UPDATE products SET qty = $new_qty WHERE id = $prod_id";
            $res_upd = mysqli_query($conn, $update_prod);
    }

    }
    
  }


    $deleteQuery = "DELETE FROM carts WHERE user_id = $user_id";
    $result_del = mysqli_query($conn, $deleteQuery);

    if($result_del){
      return response(200, "Success", true);
    }
    else{
      return response(400, "Errror", false);
      }
  }
}

function response($statusCode, $errors, $status)
{
  header('Content-Type: applications/json; charset=utf-8');
  http_response_code($statusCode);
  echo json_encode($errors);
  return $status;
  exit;
}

?>