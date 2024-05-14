<?php
include_once('functions/userfunction.php');

include_once("includes/header.php"); 

// include_once('middleware/adminmiddleware.php');
include_once('check_user.php');


// if(isset($_GET['id'])){
  // $id = $_GET['id'];
  $id = $_SESSION['auth_user']['id'];

  $sql = "SELECT * FROM users WHERE id = $id";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($result);

// }

?>

<div class="container my-5">
  <div class="row">
    <div class="col-12 col-md-3"></div>
    <div class="col-12 col-md-6">
      <div class="card">
        <div class="card-header text-center">
          Contact Form
        </div>
        <div class="card-body">
          <form action="functions/update_user_info.php" method="POST" id="userInfo" class="form">
            <div class="form-group">
              <label for="">Name</label>
              <input type="hidden" name="id" value="<?= $row['id']; ?>">
              <input type="text" name="name" class="form-control" required value="<?= $row['name']; ?>">
              <div id="nameError" class="alert alert-danger mt-2 d-none"></div>
            </div>
            <div class="form-group mt-3">
              <label for="">Email address</label>
              <input type="email" name="email" class="form-control" required value="<?= $row['email']; ?>">
              <div id="emailError" class="alert alert-danger mt-2 d-none"></div>
              <div id="validemailError" class="alert alert-danger mt-2 d-none"></div>
              <div id="existError" class="alert alert-danger mt-2 d-none"></div>
            </div>
            <div class="form-group mt-3">
              <label for="">Phone</label>
              <input type="text" name="phone" class="form-control only_numeric" required value="<?= $row['phone']; ?>">
              <div id="phoneError" class="alert alert-danger mt-2 d-none"></div>
            </div>
            <div class="form-group mt-3">
              <label for="">Address</label>
              <textarea name="address" id="" cols="30" rows="10" required class="form-control"><?= $row['address']; ?></textarea>
              <div id="addressError" class="alert alert-danger mt-2 d-none"></div>
            </div>
            <button type="submit" class="btn btn-success  mt-3" name="update_user-btn">Update</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-3"></div>
  </div>
</div>


<?php include_once("includes/footer.php"); ?>
