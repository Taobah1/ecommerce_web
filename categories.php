<?php 

include_once("functions/userfunction.php");
include_once("includes/header.php");
 ?>
 <div class="container pt-5">
 <h2> Explore Our Categories</h2>
 <hr>
 </div>
<div class="container pb-5">
  <div class="row">
    <?php 
    $category = getAll("categories");
    if(mysqli_num_rows($category) > 0){
      while($rows=mysqli_fetch_assoc($category)){

    ?>

    <div class="col-md-4 py-2">
      <a href="products.php?category=<?= $rows['slug']; ?>" class="nav-link">
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
      ?>
  </div>
</div>

<?php

?>

<?php include_once("includes/footer.php"); ?>