<?php 

include_once("functions/userfunction.php");
include_once("includes/header.php");
 ?>
<div class="container pb-5">
  <div class="row">
    <?php 
    if(isset($_GET['search_product'])){
      $search_data = $_GET['search'];

      $search = search_products($search_data);
    if(mysqli_num_rows($search) > 0){
      while($rows=mysqli_fetch_assoc($search)){

    ?>

    <div class="col-md-4 py-2">
      <a href="view_product.php?product=<?= $rows['slug']; ?>" class="nav-link">
        <div class="card shadow">
          <div style="height:200px ">
            <img src="admin/<?= $rows['image']; ?>" class="w-50" height="100%" alt="">
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
      else{
        echo "<div class='alert alert-danger text-center mt-5 py-3'>Product not found</div>";
            }
      ?>
      <?php
}

?>
  </div>
</div>


<?php include_once("includes/footer.php"); ?>