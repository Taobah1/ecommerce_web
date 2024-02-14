<?php
include_once('../middleware/adminmiddleware.php');
include_once('includes/header.php');

?>
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>All Users</h4>
        </div>
        <div class="card-body" id="product_table">
          <table class="table table-bordered text-center" id="myTable">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM users";
              $result_d = mysqli_query($conn, $sql);
              $sn = 0;
              
                while($row=mysqli_fetch_assoc($result_d)) { 
                  $sn++; 
                ?>
              <tr>
                <td><?= $sn; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['password'] ?></td>
                <td><?= $row['role_as'] == '1' ? "Admin" : "User"; ?></td>
                <td><a href="edit_user.php?id=<?= $row['id']; ?>" data-bs-target="#editModal" data-bs-toggle="modal"  class="btn btn-success editProductBtn">Edit</a></td>
                <td><button type="button" class="btn btn-danger delete_product_btn" value="<?= $row['id']; ?>">Delete</button></td>
              </tr>
              <?php
              }
                ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


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