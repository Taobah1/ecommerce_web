<?php

include_once('../middleware/adminmiddleware.php');
 include_once('includes/header.php');

?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Add Product</h4>
          <div id="message" class="alert text-white alert-success mt-2 d-none"></div>
        </div>
        <div class="card-body">
          <form action="product_form.php" id="product" class="form" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6 mb-2">
              <label for="" class="form-label mb-0 fw-bold">Select Category</label>
              <select name="category" id="" required class="form-select border ps-2">
                <option value="">select category</option>
                <?php

                  $category = getall('categories');
                  $num_of_rows = mysqli_num_rows($category);
                  if($num_of_rows > 0){
                    while($rows = mysqli_fetch_assoc($category)){
                      
                ?>
                <option value="<?= $rows['id'] ?>"><?= $rows['name'] ?></option>
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
              <input type="text" placeholder="Enter Product name" name="name" required class="form-control border ps-2">
              <div id="nameError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-2">
              <label for="" class="form-label fw-bold">Slug</label>
              <input type="text" placeholder="Enter Slug" name="slug" required class="form-control border ps-2">
              <div id="meta_titleError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
            <div class="col-md-6 mb-2">
              <label for="" class="form-label fw-bold">Meta Title</label>
              <input type="text" placeholder="Enter meta Title" name="meta_title" required class="form-control border ps-2">
              <div id="meta_titleError" class="alert alert-danger text-white mt-2 d-none"></div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-2">
              <label for="" class="form-label fw-bold">Small Description</label>
              <textarea placeholder="Enter Small Description" name="small_description" class="form-control border ps-2" id="" cols="10" rows="3"></textarea>
              <div id="small_descriptionError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
            <div class="col-md-6">
              <label for="" class="form-label fw-bold">Description</label>
              <textarea placeholder="Enter Description" name="description" class="form-control border ps-2" id="" cols="10" rows="3"></textarea>
              <div id="descriptionError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-2">
              <label for="" class="form-label fw-bold">Original Price</label>
              <input type="text" placeholder="Enter price" name="original_price" required class="form-control border ps-2 only_numeric">
              <div id="descriptionError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
            <div class="col-md-6">
              <label for="" class="form-label fw-bold">Selling price</label>
              <input type="text" placeholder="Enter Price" name="selling_price" required class="form-control border ps-2 only_numeric">
              <div id="meta_descriptionError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-2">
              <label for="" class="form-label fw-bold">Quantity</label>
              <input type="text" placeholder="Enter Quantity" name="qty" required class="form-control border ps-2 only_numeric">
              <div id="meta_titleError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
            <div class="col-md-6">
              <label for="" class="form-label fw-bold">Image</label>
              <input type="file" name="image" class="form-control border ps-2">
              <div id="imageError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="" class="form-label fw-bold">Status</label>
              <input type="checkbox" name="status" class="border ps-2">
            </div>
            <div class="col-md-6 mb-2">
              <label for="" class="form-label fw-bold">Trending</label>
              <input type="checkbox" name="trending" class="border ps-2">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-2">
              <label for="" class="form-label fw-bold">Meta Description</label>
              <textarea placeholder="Enter Meta Description" name="meta_description" class="form-control border ps-2" id="" cols="10" rows="3"></textarea>
              <div id="meta_descriptionError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
            <div class="col-md-6">
              <label for="" class="form-label fw-bold">Meta Keywords</label>
              <textarea placeholder="Enter Meta Keywords" name="meta_keywords" class="form-control border ps-2" id="" cols="10" rows="3"></textarea>
              <div id="meta_keywordsError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
          </div>
          <button class="btn btn-primary w-25" type="submit" name="add_prod_btn">Insert</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once('includes/footer.php'); ?>