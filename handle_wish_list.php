<?php 
include_once("functions/userfunction.php");
include_once("includes/header.php");
 ?>
 <div class="bg-info">
  <div class="container d-flex gap-2 text-center">
    <a href="index.php" class="nav-link"><h6>Home ></h6></a>
    <a href="cart.php" class="nav-link"><h6>Cart</h6></a>
  </div>
 </div>

<div class="container pt-5">
  <div class="row">
    <div  id="cartsItem">
      <div class="col-md-12">
        <?php
        $whishList = getWishList();
        $nor = mysqli_num_rows($whishList);
        if($nor > 0){
        ?>
        <div class="border">
          <div class="row text-center">
          <div class="col-md-1 border-end"><h4>S/N</h4></div>
            <div class="col-md-2 border-end"><h4>Image</h4></div>
            <div class="col-md-4 border-end"><h4>Name</h4></div>
            <div class="col-md-3 border-end"><h4>Price</h4></div>
            <div class="col-md-2"><h4>Action</h4></div>
          </div>
        </div>
        <?php

            
            ?>
          <?php
                $sn = 0;
                while($row=mysqli_fetch_assoc($whishList)){
                  $name = $row['name'];
                  $price = $row['selling_price'];
                  $image = $row['image'];
                  $pid = $row['prod_id'];
                  $wid = $row['wid'];
                  $sn++;
          ?>
          <div class="card mb-2">
            <div class="row text-center product-cart">
              <div class="col-md-1  pt-3 border-end">
                <p><?= $sn ?></p>
              </div>
              <div class="col-md-2 border-end">
                <img src="admin/<?= $image ?>" width="50" alt="">
              </div>
              <div class="col-md-4 pt-3 border-end">
                <p><?= $name ?></p>
              </div>
              <div class="col-md-3  pt-3 border-end">
                <p><?= $price ?></p>
              </div>
              <div class="col-md-2 pt-3">
                <button class="btn btn-sm btn-danger deletewishBtn" value="<?= $wid; ?>"><i class="fa fa-trash"></i> Remove</button>
              </div>
            </div>
          </div>        
          <?php
            }
              }  else{
              ?>
              <?php
            
                echo "<div class='alert alert-danger text-center py-5'>Your Wish list is empty</div>";
              }
              ?>
      </div>
    </div>
  </div>
</div>

    


<?php include_once("includes/footer.php"); ?>