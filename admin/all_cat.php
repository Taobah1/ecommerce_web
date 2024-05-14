<?php

 include_once('../middleware/adminmiddleware.php');
 include_once('includes/header.php');
 include_once('includes/script.php');

?>

<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>All Categories</h4>
        </div>
        <div class="card-body" id="category_table">
          <table class="table table-bordered text-center" id="categoriesTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php

              // $category = pagenation('categories');
              // $items = mysqli_num_rows($category);

              // if($items > 0) :
              ?>
              <?php 
              
                while($row=mysqli_fetch_assoc($result_d)) {  
              //   $id = $row['id'];
              //   $name = $row['name'];
              //  $image = $row['image'];
              //  $status = $row['status'];
              //  $sn++;
                ?>
              <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['name']; ?></td>
                <td><img src="<?= $row['image']; ?>" alt="" width="30"></td>
                <td><?= $row['status'] == '0' ? "Visible" : "Hidden" ; ?></td>
                <td><a href="edit_cat.php?id=<?= $row['id']; ?>" class="btn btn-success editProductBtn" data-bs-target="#editModal" data-bs-toggle="modal">Edit</a></td>
                  <input type="hidden" name="id" value="<?= $row['id'] ?>">
                  <td><button type="button" value="<?= $row['id'] ?>" class="btn btn-danger delete_cat_btn">Delete</button></td>
              </tr>
              <?php
              };
                // endwhile;
                // endif; 
                ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- <div class="text-center w-50 ms-5 mt-3">
          <?php
          if(!isset($_GET['page_no'])){
            $page = 1;
          }
          else{
            $page = $_GET['page_no'];
          }
          ?>
          Showing <?= $page ?> of <?= $pages ?> pages
        </div>
      <div class="d-flex justify-content-center">
        <div class="btn">
          <a href="?page_no=1" class="btn btn-info">First</a>

          <?php 
          if(isset($_GET['page_no']) && $_GET['page_no'] > 1){
          
          ?>
          <a href="?page_no=<?= $_GET['page_no'] -1 ?>" class="btn btn-info">Previous</a>

          <?php
          
          }else{
          ?>
          <a class="btn btn-info" href="">Previous</a>

          <?php } ?>
        </div>
        <div class="page">
          <?php
          for($counter = 1; $counter <= $pages; $counter ++){
            ?>
            <a class="btn btn-secondary mt-2" href="?page_no=<?= $counter ?>"><?= $counter ?></a>
          <?php } ?>
        </div>
        <div class="btn">

          <?php
          if(!isset($_GET['page_no']))
          {
            ?>
            <a href="?page_no=2" class="btn btn-info">Next</a>
            <?php
          }
            else
          
            {
            if($_GET['page_no'] >= $pages){
              ?>
            <a href="" class="btn btn-info">Next</a>
            <?php }else{ ?>
              <a href="?page_no=<?= $_GET['page_no'] +1 ?>" class="btn btn-info">Next</a>
              <?php } } ?>
            <a href="?page_no=<?= $pages ?>" class="btn btn-info">Last</a>
        </div>
      </div> -->
    </div>
  </div>
</div>


<div class="modal" id="editModal" tabindex="-1" style="z-index: 99999999!important">
  <div class="modal-dialog modal-x">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Product</h5>
        <button type="button" class="btn-close close-modal-btn" data-bs-dismiss="modal" aria-label="Close"><h4>X</h4></button>
      </div>
      <div class="modal-body">
        <div id="editPane"></div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<?php include_once('includes/footer.php'); ?>

<script>
  $(document).ready( function () {
      $('#categoriesTable').DataTable({
        "columnDefs": [
              {"targets": 0},
              {"targets": 3, "className": "text-center"},
              {"targets": 4, "className": "text-center"}
          ],
      });
    } );  
  </script>