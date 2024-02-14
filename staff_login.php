<?php 
// session_start();
include_once('functions/functions.php');

include_once("includes/header.php");


 


if(isset($_SESSION['auth'])){

  redirect("index.php", "You are already Logged in");
}


?>

<div class="container mt-5">
  <div class="row">
    <div class="col-12 col-md-3"></div>
    <div class="col-12 col-md-6">
      <div class="card">
        <?php if(isset($_SESSION['message'])){
            ?>
           <div class='alert alert-warning mt-3 fade show alert-dismissible text-center' role='alert'><?= $_SESSION['message']; ?>
            <button type='button' class='btn-close'data-bs-dismiss='alert' aria-label='Close'></button>
          </div>
          <?php } ?>
          <?php
          unset($_SESSION['message']); 
          ?>
        <div class="card-header text-center">
          Log In
        </div>
        <div class="card-body">
          <form action="functions/staff_auth.php" method="POST">
            <div class="form-group mt-3">
              <label for="">Email address</label>
              <input type="email" autocomplete="off" name="email" class="form-control" required placeholder="Enter your email">
              <div id="validemailError" class="alert alert-danger mt-2 d-none"></div>
            </div>
            <div class="form-group mt-3">
              <label for="">Password</label>
              <input type="password" autocomplete="new-password" name="password" class="form-control" required placeholder="password">
              <div id="passwordError" class="alert alert-danger mt-2 d-none"></div>
            </div>
            <div id="errorError" class="alert alert-danger mt-2 d-none"></div>
            <div class="d-flex justify-content-between align-items-center">
              <button type="submit" class="btn btn-primary  mt-3" name="login-btn">Submit</button>
              <a href="register.php" class="btn btn-outline">Don't have an accout? Sign up</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-3"></div>
  </div>
</div>

<?php include_once("includes/footer.php"); ?>