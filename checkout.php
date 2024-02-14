<?php 
include_once("functions/userfunction.php");
include_once("includes/header.php");
include_once("check_user.php");
 ?>
 <div class="bg-info">
  <div class="container d-flex gap-2 text-center">
    <a href="index.php" class="nav-link"><h6>Home ></h6></a>
    <a href="cart.php" class="nav-link"><h6>Products</h6></a>
  </div>
 </div>

<div class="container pt-5">
  <div class="card">
    <div class="card-body shadow">
      <form action="functions/placeorder.php" class="form" id="order" method="POST">
        <div class="row">
          <div class="col-md-7">
            <div class="row">
              <h4>Basic Details</h4>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control" required placeholder="Enter your name">
                  <div id="nameError" class="alert alert-danger mt-2 d-none"></div>
                </div>
              </div>
              <div class="col-md-6 my-2">
                <div class="form-group">
                  <label for="" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Enter your email address" required>
                  <div id="emailError" class="alert alert-danger mt-2 d-none"></div>
                  <div id="validemailError" class="alert alert-danger mt-2 d-none"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="" class="form-label">Phone</label>
                  <input type="text" name="phone" class="form-control only_numeric" placeholder="Enter your phone number" required>
                  <div id="phoneError" class="alert alert-danger mt-2 d-none"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="" class="form-label">Pin code</label>
                  <input type="text" name="pincode" class="form-control" placeholder="Enter your pin code" required>
                  <div id="pincodeError" class="alert alert-danger mt-2 d-none"></div>
                </div>
              </div>
              <div class="col-md-12 mt-2">
                <div class="form-group">
                  <label for="" class="form-label">Address</label>
                  <textarea name="address" id="" cols="20" rows="5" required class="form-control"></textarea>
                  <div id="addressError" class="alert alert-danger mt-2 d-none"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <h4>Order Details</h4>
            <?php
                $totalPrice = 0;
                
                $carts = getCarts();
                  $nor = mysqli_num_rows($carts);
                  if($nor > 0){
                    while($row=mysqli_fetch_assoc($carts)){
                      $name = $row['name'];
                      $price = $row['selling_price'];
                      $qty = $row['prod_qty'];
                      $image = $row['image'];
                      $pid = $row['prod_id'];
                      $cid = $row['cid'];
              ?>
              <div class="card mb-2">
                <div class="row text-center product-cart" id="cartsItem">
                  <div class="col-md-2">
                    <img src="admin/<?= $image ?>" width="50" alt="">
                  </div>
                  <div class="col-md-4 pt-3">
                    <p><?= $name ?></p>
                  </div>
                  <div class="col-md-2  pt-3">
                    <p><?= $price ?></p>
                  </div>
                  <div class="col-md-4 pt-3 pb-2">
                    <p>x <?= $qty ?></p>
                  </div>
                </div>
              </div>        
              <?php
              $totalPrice += $price * $qty;
                }
                    }
                
                  ?>
                  <div class="d-flex justify-content-between align-items-center">
                    <h5>Total Price: $<span><?= $totalPrice ?></span></h5>
                    <!-- <input type="hidden" name="prod_id" value="<?= $pid ?>">
                    <input type="hidden" name="qty" value="<?= $qty ?>">
                    <input type="hidden" name="price" value="<?= $price ?>"> -->
                    <input type="hidden" name="totalprice" value="<?= $totalPrice ?>">
                    <input type="hidden" name="payment_id" value="">
                    <input type="hidden" name="payment_mode" value="COD">
                    <button type="submit" name="placeorderBtn" class="btn btn-primary" id="orderNow">Order Now</button>
                  </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<?php include_once("includes/footer.php"); ?>
<!-- <script>
$(document).ready(function (){

  $(".form").submit(function (e) {
    e.preventDefault();

    let datas = $(this).serialize();

$.ajax({
          url: $(this).attr("action"),
          type: "post",
          data: datas,
          success: function (res) {
            alertify.set("notifier", "position", "top-right");
            alertify.warning("Order placed Successfully");
            // alert("Registered Successfully");
            // $("Form")[0].reset();
            // window.location = "login.php";

            // console.log(data.message);
            console.log(res);
          },

          error: function (xhr, status, error) {
            console.log(xhr);

            let errors = xhr.responseJSON;
            console.log(xhr.responseJSON);
            let errorResponse = '<div class="alert alert-danger ps-3"><ul>';
            $.each(errors, (key, err) => {
              errorResponse += `<li>${err}</li>`;
              console.log(key);
              $("#" + key + "Error")
                .removeClass("d-none")
                .text(err);
            });
            errorResponse += "</ul></div>";
            $("#" + key + "Error").reset();
          },
        });
      });
})

</script> -->