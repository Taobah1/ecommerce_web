<?php
include_once("functions/userfunction.php");
include_once("includes/header.php");
include_once('check_user.php');
?>
<div class="bg-info">
  <div class="container d-flex gap-2 text-center">
    <a href="index.php" class="nav-link"><h6>Home ></h6></a>
    <a href="orders.php" class="nav-link"><h6>Orders</h6></a>
  </div>
 </div>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <h2>My Orders</h2>
      <?php
          $sn = 1;
           $orders = orders();
           if(mysqli_num_rows($orders) > 0){
          ?>
      <table class="table text-center table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tracking No</th>
            <th>Price</th>
            <th>Date</th>
            <th>View details</th>
          </tr>
        </thead>
        <tbody>
            <?php
              foreach($orders as $order){
            ?>
            <tr>
            <td><?= $sn; ?></td>
            <td><?= $order['tracking_id']; ?></td>
            <td><?= $order['total_price']; ?></td>
            <td><?= $order['created_at']; ?></td>
            <td><a href="view-order.php?tracking=<?= $order['tracking_id']; ?>" class="btn btn-primary">View More</a></td>
            </tr>
            <?php $sn++; } ?>
        </tbody>
      </table>
      <?php
            }
            else{
              ?>
              <div class="row">
                <div class="col-md-4"></div>
                <div class="bg-danger rounded col-md-4 text-center p-3 text-white">No Orders Yet</div>
                <div class="col-md-4"></div>
              </div>
              <?php
            }
      ?>
    </div>
  </div>
</div>

<?php include_once("includes/footer.php"); ?>