<?php
 include_once('../middleware/adminmiddleware.php');
//  include_once('includes/header.php');

?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php if(isset($_GET['id']))
      {
        $id = $_GET['id'];

        // $category = getById('categories', $id);
        $sql = "SELECT * FROM categories WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){

        // if(mysqli_num_rows($category) > 0){
       ?>
      <div class="card">
        <div class="card-header">
          <h4>Add Category</h4>
          <div id="message" class="alert text-white alert-success mt-2 d-none"></div>
        </div>
        <div class="card-body">
          <form action="update_cat.php" id="update_cat" class="form" method="POST" enctype="multipart/form-data">
          <div class="row">
            <?php
              while($rows = mysqli_fetch_assoc($result)){
                ?>
            <div class="col-md-6 mb-2">
              <input type="hidden" name="id" value="<?= $rows['id']; ?>">
              <label for="" class="form-label fw-bold">Name</label>
              <input type="text" placeholder="Enter Category Name" value="<?= $rows['name'] ?>" name="name" required class="form-control border ps-2">
              <div id="nameError" class="alert text-white alert-danger mt-2 d-none"></div>
            </div>
            <div class="col-md-6">
              <label for="" class="form-label fw-bold">Slug</label>
              <input type="text" placeholder="Enter Slug" value="<?= $rows['slug'] ?>" name="slug" required class="form-control border ps-2">
              <div id="slugError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-2">
              <label for="" class="form-label fw-bold">Meta Title</label>
              <input type="text" placeholder="Enter Category Title" value="<?= $rows['meta_title'] ?>" name="meta_title" required class="form-control border ps-2">
              <div id="meta_titleError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
            <div class="col-md-6">
              <label for="" class="form-label fw-bold">Image</label>
              <input type="file" name="image" <?php if(!$rows['image']){ ?> required <?php } ?> class="form-control border ps-2">
              <div id="imageError" class="alert alert-danger text-white mt-2 d-none"></div>
              <label for="" class="form-label fw-bold">Current Image</label><br>
              <input type="hidden" name="old_image" value="<?= $rows['image']; ?>">
              <img src="<?= $rows['image'] ?>" width="40" alt="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-2">
              <label for="" class="form-label fw-bold">Description</label>
              <textarea placeholder="Enter Description" name="description" class="form-control border ps-2" id="" cols="10" rows="3"><?= $rows['description'] ?></textarea>
              <div id="descriptionError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
            <div class="col-md-6">
              <label for="" class="form-label fw-bold">Meta Description</label>
              <textarea placeholder="Enter Meta Description" name="meta_description" class="form-control border ps-2" id="" cols="10" rows="3"><?= $rows['meta_description'] ?></textarea>
              <div id="meta_descriptionError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 mb-2">
              <label for="" class="form-label fw-bold">Meta Keywords</label>
              <textarea placeholder="Enter Meta Keywords" name="meta_keywords"  class="form-control border ps-2" id="" cols="10" rows="3"><?= $rows['meta_keywords'] ?></textarea>
              <div id="meta_keywordsError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="" class="form-label fw-bold">Status</label>
              <input type="checkbox" name="status" <?= $rows['status'] ? "checked" : "" ?> class="border ps-2">
            </div>
            <div class="col-md-6 mb-2">
              <label for="" class="form-label fw-bold">Popular</label>
              <input type="checkbox" name="popular" <?= $rows['popular'] ? "checked" : "" ?> class="border ps-2">
            </div>
            <?php } ?>
          </div>
          <button class="btn btn-primary" type="submit" name="update_cat_btn">Update</button>
          </form>
        </div>
      </div>
      <?php 
      // }
        }
        else{
          echo "Category not found";
        }
      }
        else {
          echo "Something went wrong";
        }
      ?>
    </div>
  </div>
</div>

<?php include_once('includes/footer.php'); ?>