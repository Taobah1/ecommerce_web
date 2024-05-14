<?php
include_once("functions/userfunction.php");
include_once("includes/header.php");

if(isset($_GET['category'])){
$category_slug = $_GET['category'];
$category_s = getSlugActive('categories', $category_slug);
$row_s = mysqli_fetch_assoc($category_s);
if($row_s){
$cid = $row_s['id'];
$name = $row_s['name'];

 ?>
 <div class="container pt-5">
 <h2> Explore Our <?= $name ?></h2>
 <hr>
 </div>
<div class="container pb-5">
  <div class="row">
    <?php 
    $category = getProductByCat($cid);
    if(mysqli_num_rows($category) > 0){
      while($rows=mysqli_fetch_assoc($category)){

    ?>

    <div class="col-md-4 py-2 trending">
      <a href="view_product.php?product=<?= $rows['slug']; ?>" class="nav-link">
        <div class="card shadow">
          <div style="height:200px ">
            <img src="admin/<?= $rows['image']; ?>" class="w-50 p-4" height="100%" alt="">
          </div>
          <div class="card-body">
            <h4 class="card-title text-center"><?= $rows['name']; ?></h4>
          </div>
        </div>
      </a>
    </div>
    <?php
       }
      }
      ?>
  </div>
</div>

<?php
}
else{
  echo "Something is wrong";
}
}
else{
  echo "Something went wrong";
}
?>

<?php include_once("includes/footer.php"); ?>