<?php
 include_once('includes/header.php');

?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Add Category</h4>
          <div id="message" class="alert text-white alert-success mt-2 d-none"></div>
        </div>
        <div class="card-body">
          <form action="category_form.php" id="category" class="form" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6 mb-2">
              <label for="" class="form-label fw-bold">Name</label>
              <input type="text" placeholder="Enter Category Name" name="name" required class="form-control border ps-2">
              <div id="nameError" class="alert text-white alert-danger mt-2 d-none"></div>
            </div>
            <div class="col-md-6">
              <label for="" class="form-label fw-bold">Slug</label>
              <input type="text" placeholder="Enter Slug" name="slug" required class="form-control border ps-2">
              <div id="slugError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-2">
              <label for="" class="form-label fw-bold">Meta Title</label>
              <input type="text" placeholder="Enter Category Title" name="meta_title" required class="form-control border ps-2">
              <div id="meta_titleError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
            <div class="col-md-6">
              <label for="" class="form-label fw-bold">Image</label>
              <input type="file" name="image" required class="form-control border ps-2">
              <div id="imageError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-2">
              <label for="" class="form-label fw-bold">Description</label>
              <textarea placeholder="Enter Description" name="description" class="form-control border ps-2" id="" cols="10" rows="3"></textarea>
              <div id="descriptionError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
            <div class="col-md-6">
              <label for="" class="form-label fw-bold">Meta Description</label>
              <textarea placeholder="Enter Meta Description" name="meta_description" class="form-control border ps-2" id="" cols="10" rows="3"></textarea>
              <div id="meta_descriptionError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 mb-2">
              <label for="" class="form-label fw-bold">Meta Keywords</label>
              <textarea placeholder="Enter Meta Keywords" name="meta_keywords" class="form-control border ps-2" id="" cols="10" rows="3"></textarea>
              <div id="meta_keywordsError" class="alert alert-danger text-white mt-2 d-none"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="" class="form-label fw-bold">Status</label>
              <input type="checkbox" name="status" class="border ps-2">
            </div>
            <div class="col-md-6 mb-2">
              <label for="" class="form-label fw-bold">Popular</label>
              <input type="checkbox" name="popular" class="border ps-2">
            </div>
          </div>
          <button class="btn btn-primary" type="submit" name="add_cat_btn">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once('includes/footer.php'); ?>