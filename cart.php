<?php 
include_once("functions/userfunction.php");
include_once("includes/header.php");
include_once("check_user.php");
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
        $carts = getCarts();
        $nor = mysqli_num_rows($carts);
        if($nor > 0){
        ?>
        <div class="border">
          <div class="row text-center">
            <div class="col-md-2 border-end"><h4>Image</h4></div>
            <div class="col-md-4 border-end"><h4>Name</h4></div>
            <div class="col-md-2 border-end"><h4>Quantity</h4></div>
            <div class="col-md-2 border-end"><h4>Price</h4></div>
            <div class="col-md-2"><h4>Action</h4></div>
          </div>
        </div>
        <?php

            
            ?>
          <?php
                while($row=mysqli_fetch_assoc($carts)){
                  $name = $row['name'];
                  $price = $row['selling_price'];
                  $qty = $row['prod_qty'];
                  $image = $row['image'];
                  $pid = $row['prod_id'];
                  $cid = $row['cid'];
          ?>
          <div class="card mb-2">
            <div class="row text-center product-cart">
              <div class="col-md-2 border-end">
                <img src="admin/<?= $image ?>" width="50" alt="">
              </div>
              <div class="col-md-4 pt-3 border-end">
                <p><?= $name ?></p>
              </div>
              <div class="col-md-2 pt-3 ps-5 border-end">
                <div class='input-group mb-3' style="width: 120px;">
                  <input type="hidden" name="prodId" class="prodId" value="<?= $pid; ?>">
                  <button class='input-group-text decreament-btn updateQty'>-</button>
                  <input type='text' name='qty' class='form-control text-center input-qty' disabled value='<?= $qty ?>'>
                  <button class='input-group-text increament-btn updateQty'>+</button>
                </div>
              </div>
              <div class="col-md-2  pt-3 border-end">
                <p><?= $price ?></p>
              </div>
              <div class="col-md-2 pt-3">
                <button class="btn btn-sm btn-danger deleteCartBtn" value="<?= $cid; ?>"><i class="fa fa-trash"></i> Remove</button>
              </div>
            </div>
          </div>        
          <?php
            }
              ?>
               <a href="checkout.php"><button class="float-end btn btn-primary">Checkout</button></a>
            <?php
              }  else{
              ?>
              <?php
            
                echo "<div class='alert alert-danger text-center py-5'>Your Cart is empty</div>";
              }
              ?>
      </div>
    </div>
  </div>
</div>

    


<?php include_once("includes/footer.php"); ?>