<?php
include_once("functions/userfunction.php");
include_once("includes/header.php");

if(isset($_GET['product'])){
$product_slug = $_GET['product'];
$product_s = getSlugActive('products', $product_slug);
$row_s = mysqli_fetch_assoc($product_s);
if($row_s){
$pid = $row_s['id'];
$image = $row_s['image'];
$name = $row_s['name'];
$description = $row_s['description'];
$ori_price = $row_s['origina_price'];
$sell_price = $row_s['selling_price'];
?>
<div class="bg-info">
  <div class="container d-flex gap-2 text-center">
    <a href="index.php" class="nav-link"><h6>Home ></h6></a>
    <a href="products.php" class="nav-link"><h6>Products</h6></a>
  </div>
 </div>
<div class="container mt-5 product-cart">
  <div class="row">
    <div class="col-md-4">
      <img src="admin/<?= $image; ?>" alt="">
    </div>
    <div class="col-md-6">
      <h4><?= $name; ?></h4>
      <hr>
      <div class="d-flex justify-content-between">
        <p>Rs <span class="text-danger"><s><?= $ori_price; ?></s></span></p>
        <p>Rs <?= $sell_price; ?></p>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class='input-group mb-3' style="width: 130px;">
            <button class='input-group-text decreament-btn'>-</button>
            <input type='text' name='qty' class='form-control text-center input-qty' disabled value='1'>
            <button class='input-group-text increament-btn'>+</button>
          </div>
        </div>
      </div>
      <div class="row mb-3 mt-3">
        <div class="col-6 col-md-6">
          <button type="button" class="btn btn-primary addToCartBtn" value="<?= $pid; ?>"><i class="fa fa-shopping-cart me-2"></i>Add to Cart</button>
        </div>
        <div class=" col-6 col-md-6">
        <button type="button" class="btn btn-danger"><i class="fa fa-heart me-2"></i>Add to Whishlist</button>
        </div>
      </div>
      <hr>
      <p><?= $description; ?></p>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>
<?php
}
else{
  echo "Something went wrong";
}


}
else{
  echo "Something went wrong";
}

?>
<?php include_once("includes/footer.php"); ?>

