<?php
include_once('../middleware/adminmiddleware.php');
include_once("includes/header.php");
?>


        <?php if(isset($_SESSION['message'])){
            ?>
           <div class='alert alert-warning mt-3 fade show alert-dismissible text-center w-50' role='alert'><?= $_SESSION['message']; ?>
            <button type='button' class='btn-close'data-bs-dismiss='alert' aria-label='Close'></button>
          </div>
          <?php } ?>
          <?php
          unset($_SESSION['message']); 
       ?>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <h2>My Orders</h2>
      <?php
           $orders = getAllOrders();
           if(mysqli_num_rows($orders) > 0){
          ?>
      <table class="table text-center table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>User ID</th>
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
            <td><?= $order['id']; ?></td>
            <td><?= $order['user_id']; ?></td>
            <td><?= $order['tracking_id']; ?></td>
            <td><?= $order['total_price']; ?></td>
            <td><?= $order['created_at']; ?></td>
            <td><a href="view-order.php?tracking=<?= $order['tracking_id']; ?>" class="btn btn-primary">View Details</a></td>
            </tr>
            <?php } ?>
        </tbody>
      </table>
    </div>
    <?php
            }
            else{
              ?>
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 btn-danger btn p-2 text-white text-center">No Orders Yet</div>
                <div class="col-md-4"></div>
              </div>
              <?php
            }
      ?>
  </div>
</div>

<?php include_once("includes/footer.php"); ?>