<?php 
// session_start();

include_once('functions/userfunction.php');

include_once("includes/header.php"); 


if(isset($_SESSION['auth'])){

  redirect('index.php', 'You are already Logged in');
}


?>

<div class="container mt-5">
  <div class="row">
    <div class="col-12 col-md-3"></div>
    <div class="col-12 col-md-6">
      <div class="card">
        <div class="card-header text-center">
          Registration Form
        </div>
        <div class="card-body">
          <form action="functions/authcode.php" method="POST" id="register" class="form">
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" class="form-control" required placeholder="Enter your name">
              <div id="nameError" class="alert alert-danger mt-2 d-none"></div>
            </div>
            <div class="form-group mt-3">
              <label for="">Email address</label>
              <input type="email" name="email" class="form-control" required placeholder="Enter your email">
              <div id="emailError" class="alert alert-danger mt-2 d-none"></div>
              <div id="validemailError" class="alert alert-danger mt-2 d-none"></div>
              <div id="existError" class="alert alert-danger mt-2 d-none"></div>
            </div>
            <div class="form-group mt-3">
              <label for="">Phone</label>
              <input type="text" name="phone" class="form-control only_numeric" required placeholder="Enter phone nunber">
              <div id="phoneError" class="alert alert-danger mt-2 d-none"></div>
            </div>
            <div class="form-group mt-3">
              <label for="">Password</label>
              <input type="password" name="password" class="form-control" required placeholder="Confirm password">
              <div id="passwordError" class="alert alert-danger mt-2 d-none"></div>
            </div>
            <div class="form-group mt-3">
              <label for="">Confirm Password</label>
              <input type="password" name="confirmPass" class="form-control" required placeholder="Confirm password">
              <div id="confirmPassError" class="alert alert-danger mt-2 d-none"></div>
              <div id="invalidpasswordError" class="alert alert-danger mt-2 d-none"></div>
            </div>
            <button type="submit" class="btn btn-success  mt-3" name="register-btn">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-3"></div>
  </div>
</div>

<?php include_once("includes/footer.php"); ?>