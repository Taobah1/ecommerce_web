<?php
include_once("includes/dbconn.php");

$category_id = $_POST['category'];
$name = $_POST['name'];
$slug = $_POST['slug'];
$meta_title = $_POST['meta_title'];
$description = $_POST['description'];
$meta_description = $_POST['meta_description'];
$meta_keywords = $_POST['meta_keywords'];
$status = isset($_POST['status']) ? "1" : "0";
$trending = isset($_POST['trending']) ? "1" : "0";
$small_description = $_POST['small_description'];
$original_price = $_POST['original_price'];
$selling_price = $_POST['selling_price'];
$qty = $_POST['qty'];

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

// var_dump($name);
// exit;

if($hasError){
  return response(400, $errorBag, false);
  exit;
}

else{
  
  if($image['name']){
    
  $imageNewName = $imageOriExt .'-'. uniqid('', true). "." . $imageActualExt;
  $imageDestination = "uploads/". $imageNewName;
  
  if(!is_dir('uploads')){
    mkdir('uploads', 075, true);
  }

  
  move_uploaded_file($imageTmpName, $imageDestination);

  $insert_query = "INSERT INTO products (category_id,name,slug,description,small_description,meta_title,meta_description,meta_keywords,origina_price,selling_price,qty,status,trending,image) VALUES
($category_id,'$name','$slug','$description','$small_description','$meta_title','$meta_description','$meta_keywords',$original_price,$selling_price,$qty,'$status','$trending','$imageDestination')";

$query_result = mysqli_query($conn, $insert_query);

if($query_result){
  $message = "Successful";
 return response(200, $message, true);
}
  else{
    $error7 = "error inserting data". " " .$conn->error;
  return response(400, $error7, false);
  }

  }
  else{
    $insert_query2 = "INSERT INTO products (category_id,name,slug,description,small_description,meta_title,meta_description,meta_keywords,origina_price,selling_price,qty,status,trending) VALUES
($category_id,'$name','$slug','$description','$small_description','$meta_title','$meta_description','$meta_keywords',$original_price,$selling_price,$qty,'$status','$trending')";

$query_result2 = mysqli_query($conn, $insert_query2);

if($query_result2){
  $message = "Successful";
 return response(200, $message, true);
}
  else{
    $error7 = "error inserting data". " " .$conn->error;
  return response(400, $error7, false);
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