<?php 
// session_start();
include_once('functions/userfunction.php');
include_once("includes/header.php");
 ?>

<h2 class="bg-warning text-center">Welcome to Taobah Store</h2>

<?php


if(isset($_SESSION['message'])){
  ?>
  <div class='alert alert-warning fade show alert-dismissible text-center' role='alert'><?= $_SESSION['message']; ?>
  <button type='button' class='btn-close'data-bs-dismiss='alert' aria-label='Close'></button>
  </div>
  <?php
   unset($_SESSION['message']); 
}
?>

<div class="container pb-5">
  <div id="carouselControl" class="carousel slide pt-2" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/img/dummy-slide-1.jpg" alt="" class="img-fluid">
      </div>
      <div class="carousel-item">
        <img src="assets/img/dummy-slide-2.jpg" alt="" class="img-fluid">
      </div>
    </div>
    <button class="prev fs-5 carousel-control-prev" type="button" data-bs-target="#carouselControl" data-bs-slide="prev">
      <span><i class="fa fa-chevron-left"></i></span>
    </button>
    <button class="next fs-5 carousel-control-next" type="button" data-bs-target="#carouselControl" data-bs-slide="next">
      <span><i class="fa fa-chevron-right"></i></span>
    </button>
  </div>
</div>

<div class="container pb-5">
<h4>Trending Products</h4>
    <hr>
  <div class="row">
    <?php 
    $trending = getTrending();
    if(mysqli_num_rows($category) > 0){
      while($rows=mysqli_fetch_assoc($trending)){

    ?>

    <div class="col-md-4 py-2 trending">
      <a href="view_product.php?product=<?= $rows['slug']; ?>" class="nav-link">
        <div class="card shadow">
          <div style="height:200px; ">
            <img src="admin/<?= $rows['image']; ?>" class="w-50 p-3" height="100%" alt="">
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


<?php include_once("includes/footer.php"); ?>