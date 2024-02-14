<?php
include_once("includes/dbconn.php");

$id = $_POST['id'];
$name = $_POST['name'];
$slug = $_POST['slug'];
$meta_title = $_POST['meta_title'];
$description = $_POST['description'];
$meta_description = $_POST['meta_description'];
$meta_keywords = $_POST['meta_keywords'];
$status = isset($_POST['status']) ? "1" : "0";
$trending = isset($_POST['trending']) ? "1" : "0";
$small_description = $_POST['small_description'];
$original_price = $_POST['origina_price'];
$selling_price = $_POST['selling_price'];
$qty = $_POST['qty'];
$old_image = $_POST['old_image'];

// var_dump($old_image);
// exit;

$hasError = false;
$errorBag = [];


if(trim($name)==''){
  $errorBag['name'] = "This field is required";
  $hasError = true;
}

if(trim($slug)==''){
  $errorBag['slug'] = "This field is required";
  $hasError = true;
}

if(trim($meta_title)==''){
  $errorBag['meta_title'] = "This field is required";
  $hasError = true;
}

if(trim($description)==''){
  $errorBag['description'] = "This field is required";
  $hasError = true;
}

if(trim($meta_description)==''){
  $errorBag['meta_description'] = "This field is required";
  $hasError = true;
}

if(trim($meta_keywords)==''){
  $errorBag['meta_keywords'] = "This field is required";
  $hasError = true;
}

$image = $_FILES['image'];
  
if($image['name'])
{
  $imageName = $image['name'];
  $imageSize = $image['size'];
  $imageError = $image['error'];
  $imageType = $image['type'];
  $imageTmpName = $image['tmp_name'];

  $imageExt = explode('.', $imageName);

  $imageActualExt = strtolower(end($imageExt));

  $allowed = ['jpeg', 'png', 'jpg'];

  if(!in_array($imageActualExt, $allowed)){
    $errorBag['image'] = 'Only files with jpeg, png or jpg is allowed';
    $hasError = true;
  }

  if($imageError !== 0){
    $errorBag['error'] = "There was an error uploading your image";
    $hasError = true;
  }

  if($imageSize >1000000){
    $errorBag['size'] = "This image is too big to upload";
    $hasError = true;
  }

  unset($imageExt[count($imageExt)-1]);
  $imageOriExt = implode('-', $imageExt);
}


if($hasError){
  return response(400, $errorBag, false);
  exit;
}

else{ 
  $newimageDestination = $old_image;

  if($image['name'])
  {
    $imageNewName = $imageOriExt .'-'. uniqid('', true). "." . $imageActualExt;
    $imageDestination = "uploads/". $imageNewName;

    $newimageDestination = $imageDestination;
      
    
    move_uploaded_file($imageTmpName, $newimageDestination);
  }
  

$update_query = "UPDATE products SET name = '$name', slug = '$slug', description = '$description', meta_title = '$meta_title', meta_description = '$meta_description', meta_keywords = '$meta_keywords', small_description = '$small_description',
origina_price = $original_price, selling_price = $selling_price, qty = $qty, status = '$status', trending = '$trending', image = '$newimageDestination' WHERE id = $id";

$query_result = mysqli_query($conn, $update_query);

if($query_result){
 $message = "Successful";
 return response(200, $message, true);
}
  else{
    $error7 = "error updating data"." " .$conn->error;
  return response(400, $error7, false);
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