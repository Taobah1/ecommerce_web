<?php 
include_once('../middleware/adminmiddleware.php');

 if(isset($_GET['id']))
      {
        $id = $_GET['id'];

        $sql = "SELECT * FROM staffs WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);
?>

<div class="container mt-5">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header text-center">
          Update Staff
        </div>
        <div class="card-body">
          <form action="update_staff.php" method="POST" id="update_user" class="form">
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" class="form-control" required value="<?= $row['name'] ?>">
              <div id="nameError" class="alert alert-danger mt-2 d-none"></div>
            </div>
            <div class="form-group mt-3">
              <label for="">Email address</label>
              <input type="email" name="email" class="form-control" required value="<?= $row['email'] ?>">
              <div id="emailError" class="alert alert-danger mt-2 d-none"></div>
              <div id="validemailError" class="alert alert-danger mt-2 d-none"></div>
              <div id="existError" class="alert alert-danger mt-2 d-none"></div>
            </div>
            <div class="form-group mt-3">
              <label for="">Phone</label>
              <input type="text" name="phone" class="form-control only_numeric" required value="<?= $row['phone'] ?>">
              <div id="phoneError" class="alert alert-danger mt-2 d-none"></div>
            </div>
            <div class="form-group mt-3">
              <label for="">Password</label>
              <input type="password" name="password" class="form-control" required value="<?= $row['password'] ?>">
              <input type="hidden" name="id" value="<?= $row['id']; ?>">
              <div id="passwordError" class="alert alert-danger mt-2 d-none"></div>
            </div>
            <div class="form-group">
              <label for="">Role</label>
              <select name="role" id="" class="form-select">
                <option value="1"<?= $row['role_as'] == '1' ? "selected" : ""; ?>>Admin</option>
                <option value="0"<?= $row['role_as'] == '0' ? "selected" : ""; ?>>User</option>
              </select>
            </div>
            <button type="submit" class="btn btn-success  mt-3" name="update-btn">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
 }
 else{
  echo "<div class='alert alert-danger p-2 text-center'>Something went wrong</div>";
 }
?>

<?php include_once('includes/footer.php'); ?>