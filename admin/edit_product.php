<?php

include_once('../middleware/adminmiddleware.php');
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
    <?php if(isset($_GET['id']))
      {
        $id = $_GET['id'];

        // $category = getById('categories', $id);
        $sql = "SELECT * FROM products WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){

        // if(mysqli_num_rows($category) > 0){
       ?>
      <div class="card">
        <!-- <div class="card-header"> -->
          <!-- <h4>Add Product</h4> -->
          <!-- <div id="message" class="alert text-white alert-success mt-2 d-none"></div> -->
        </div>
        <div class="card-body">
          <form action="update_product.php" id="product" class="form" method="POST" enctype="multipart/form-data">
          <div class="row">
          <?php
              while($rows = mysqli_fetch_assoc($result)){
                $cid = $rows['category_id'];
                ?>
            <div class="col-md-6 mb-2">
              <label for="" class="form-label mb-0 fw-bold">Select Category</label>
              <select name="category" id="" required class="form-select border ps-2">
                <?php $sql = "SELECT * FROM categories WHERE id = $cid";
                      $result_c = mysqli_query($conn, $sql);
                      $row_c = mysqli_fetch_assoc($result_c);
                ?>
                <option value="<?= $row_c['id'] ?>"><?= $row_c['name']; ?></option>
                <?php

                  $category = getall('categories');
                  $num_of_rows = mysqli_num_rows($category);
                  if($num_of_rows > 0){
                    while($rows_cc = mysqli_fetch_assoc($category)){
                      
                ?>
                <option value="<?= $rows_cc['id']; ?>"><?= $rows_cc['name']; ?></option>
                <?php
                
                    }
                  }
                  else{
                    echo "No category available";
                  }
                  ?>
              </select>
            </div>
            <div class="col-md-6">
              <label for="" class="form-label fw-bold">Name</label>
              <input type="hidden" name="id" value="<?= $rows['id']; ?>">
              <input type="text" value="<?= $rows['name']; ?>" name="name" required class="form-control border ps-2">
              <div id="nameError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-2">
              <label for="" class="form-label fw-bold">Slug</label>
              <input type="text" value="<?= $rows['slug']; ?>" name="slug" required class="form-control border ps-2">
              <div id="meta_titleError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
            <div class="col-md-6 mb-2">
              <label for="" class="form-label fw-bold">Meta Title</label>
              <input type="text" value="<?= $rows['meta_title']; ?>" name="meta_title" required class="form-control border ps-2">
              <div id="meta_titleError" class="alert alert-danger text-white mt-2 d-none"></div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-2">
              <label for="" class="form-label fw-bold">Small Description</label>
              <textarea name="small_description" class="form-control border ps-2" id="" cols="10" rows="3"><?= $rows['small_description']; ?></textarea>
              <div id="small_descriptionError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
            <div class="col-md-6">
              <label for="" class="form-label fw-bold">Description</label>
              <textarea name="description" class="form-control border ps-2" id="" cols="10" rows="3"><?= $rows['description']; ?></textarea>
              <div id="descriptionError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-2">
              <label for="" class="form-label fw-bold">Original Price</label>
              <input type="text" value="<?= $rows['origina_price']; ?>" name="origina_price" required class="form-control border ps-2 only_numeric">
              <div id="origina_priceError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
            <div class="col-md-6">
              <label for="" class="form-label fw-bold">Selling price</label>
              <input type="text" value="<?= $rows['selling_price']; ?>" name="selling_price" required class="form-control border ps-2 only_numeric">
              <div id="selling_priceError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-2">
              <label for="" class="form-label fw-bold">Quantity</label>
              <input type="text" value="<?= $rows['qty']; ?>" name="qty" required class="form-control border ps-2 only_numeric">
              <div id="qtyError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
            <div class="col-md-6">
              <label for="" class="form-label fw-bold">Image</label>
              <input type="file" name="image" <?php if(!$rows['image']){ ?> required <?php } ?> class="form-control border ps-2">
              <input type="hidden" name="old_image" value="<?= $rows['image'] ?>">  
              <div id="imageError" class="alert alert-danger text-white mt-2 d-none"></div>
              Current Image
              <img src="<?= $rows['image']; ?>" class="mt-2" alt="" width="50">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="" class="form-label fw-bold">Status</label>
              <input type="checkbox" <?= $rows['status'] ? "checked" : ""; ?> name="status" class="border ps-2">
            </div>
            <div class="col-md-6 mb-2">
              <label for="" class="form-label fw-bold">Trending</label>
              <input type="checkbox" <?= $rows['trending'] ? "checked" : ""; ?> name="trending" class="border ps-2">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-2">
              <label for="" class="form-label fw-bold">Meta Description</label>
              <textarea name="meta_description" class="form-control border ps-2" id="" cols="10" rows="3"><?= $rows['meta_description']; ?></textarea>
              <div id="meta_descriptionError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
            <div class="col-md-6">
              <label for="" class="form-label fw-bold">Meta Keywords</label>
              <textarea name="meta_keywords" class="form-control border ps-2" id="" cols="10" rows="3"><?= $rows['meta_keywords']; ?></textarea>
              <div id="meta_keywordsError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
                <?php }; ?>
          </div>
          <button class="btn btn-primary w-25" type="submit" name="update_prod_btn">Update</button>
          </form>
        </div>
      </div>
      <?php
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
 