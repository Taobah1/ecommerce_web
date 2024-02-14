<?php
include_once("functions/userfunction.php");
include_once("includes/header.php");
?>


<?php
if(isset($_GET['tracking'])){
  $tracking_id = $_GET['tracking'];

  $select = "SELECT * FROM orders WHERE tracking_id = '$tracking_id'";
  $result = mysqli_query($conn, $select);

  $row = mysqli_fetch_assoc($result);
  $tracking = $row['tracking_id'];
  $name = $row['name'];
  $email = $row['email'];
  $phone = $row['phone'];
  $address = $row['address'];
  $pincode = $row['pincode'];

}


?>
<div class="container my-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between align-items-center">
          <h4>View Order</h4>
          <a href="orders.php" class="btn btn-warning"><i class="fa fa-reply"></i> Back</a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <h2>Delivery Details</h2>
              <hr>
              <div class="row">
                <div class="col-md-12">
                  <label for="" class="form-label m-0">Name</label>
                  <div class="border p-1">
                    <?= $name; ?>
                  </div>
                </div>
                <div class="col-md-12 my-2">
                  <label for="" class="form-label m-0">Email</label>
                  <div class="border p-1">
                    <?= $email; ?>
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="" class="form-label m-0">Address</label>
                  <div class="border p-1">
                    <?= $address; ?>
                  </div>
                </div>
                <div class="col-md-12 my-2">
                  <label for="" class="form-label m-0">Phone</label>
                  <div class="border p-1">
                    <?= $phone; ?>
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="" class="form-label m-0">Tracking No</label>
                  <div class="border p-1">
                    <?= $tracking; ?>
                  </div>
                </div>
                <div class="col-md-12 my-2">
                  <label for="" class="form-label m-0">Pin Code</label>
                  <div class="border p-1">
                    <?= $pincode; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <h2>Order Details</h2>
              <hr>
              <table class="table">
                <?php
                  $user_id = $_SESSION['auth_user']['id'];
                  $order_query = "SELECT o.id AS oid, o.tracking_id, o.status, o.payment_mode, o.total_price, o.user_id, oi.order_id, oi.prod_id, oi.price, oi.qty AS quantity, p.* FROM orders o, order_items oi, products p WHERE
                                  o.user_id = $user_id AND oi.order_id = o.id AND oi.prod_id = p.id AND o.tracking_id = '$tracking'";
                  $res_query = mysqli_query($conn, $order_query);

                  if(mysqli_num_rows($res_query) > 0){
                
                ?>
                <thead>
                  <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    
                    foreach($res_query as $order){

                   
                    ?>
                  <tr>
                    
                    <td class="align-middle">
                      <p><?= $order['name']; ?><span class="ms-3"><img src="admin/<?= $order['image']; ?>" width="50" alt=""></span></p>
                    </td>
                    <td class="align-middle"><?= $order['price']; ?></td>
                    <td class="align-middle"><?= $order['quantity']; ?></td>

                    

                  </tr>
                  <?php
                }
              }
              ?>
                </tbody>
              </table>
              <h4>Total Price: &nbsp $<?= $order['total_price']; ?></h4>
              <hr>
              <label for="" class="form-label m-0">Payment Mode</label>
              <div class="border p-1">
                <?= $order['payment_mode'] ?>
              </div>
              <hr>
              <label for="" class="form-label m-0">Status</label>
              <div class="border p-1">
                <?php
                
                if($order['status'] == 0){
                  echo "Under Processing";
                }
                elseif($order['status'] == 1){
                  echo "Completed";
                }
                elseif($order['status'] == 2){
                  echo "Cancelled";
                }

                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once("includes/footer.php"); ?>