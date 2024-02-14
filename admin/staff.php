<?php
include_once('../middleware/adminmiddleware.php');
include_once('includes/header.php');

?>

  <h1 class="container text-center text-white bg-black my-5">STAFF LIST</h1>
  <div class="container mt-5">
    <div class="d-flex justify-content-between mb-2">
      <h2>ALL STAFFS</h2>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">ADD STAFF</button>
    </div>
    <div class="card-body">
          <table class="table table-bordered text-center" id="myTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $sql = "SELECT * FROM staffs";
              $result_d =mysqli_query($conn, $sql);
              
                while($row=mysqli_fetch_assoc($result_d)) { 
                ?>
              <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['password'] ?></td>
                <td><a href="edit_staff.php?id=<?= $row['id']; ?>" class="btn btn-success editProductBtn" data-bs-target="#editModal" data-bs-toggle="modal">Edit</a></td>
                  <td><button type="button" value="<?= $row['id'] ?>" class="btn btn-danger delete_cat_btn">Delete</button></td>
              </tr>
              <?php
              }; 
                ?>
            </tbody>
          </table>
        </div>
  </div>
  <form action="student_db.php" method="POST" id="studentForm">
    <!-- Modal -->
    <!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">ADD STUDENTS</h1>
            <button type="button" class="btn-close clearData" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="">First Name</label>
            <input type="text" name="fname" class="form-control">
            <div id="fnameError" class="alert alert-danger mt-2 d-none"></div>
          </div>
          <div class="form-group">
            <label for="">Last Name</label>
            <input type="text" name="lname" class="form-control">
            <div id="lnameError" class="alert alert-danger mt-2 d-none"></div>
          </div>
          <div class="form-group">
            <label for="">Age</label>
            <input type="text" name="age" class="form-control">
            <div id="ageError" class="alert alert-danger mt-2 d-none"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary clearData" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" name="submit">ADD</button>
        </div>
      </div>
    </div> -->
  </form>

  <div class="modal" id="editModal" tabindex="-1" style="z-index: 99999999!important">
    <div class="modal-dialog modal-x">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit User</h5>
          <button type="button" class="btn-close close-modal-btn" data-bs-dismiss="modal" aria-label="Close"><h4></h4></button>
        </div>
        <div class="modal-body">
          <div id="editPane"></div>
        </div>
      </div>
    </div>
  </div>


  <?php include_once('includes/footer.php'); ?>