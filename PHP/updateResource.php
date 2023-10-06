<head><?php   include "../includes/head.php"   ?></head>
<div class="container small-container">
  <h1>New Resource</h1>
  <form method="POST" action="" enctype="multipart/form-data">
  <div class="mb-3">
      <label for="newProductName" class="form-label">ID</label>
      <input type="text" class="form-control" id="newProductName" name="name" required >
    </div>
    <div class="mb-3">
      <label for="newProductName" class="form-label">Name</label>
      <input type="text" class="form-control" id="newProductName" name="name" required >
    </div>
    <head><?php   include "../includes/head.php"   ?></head>
    <div class="mb-3">
      <label for="newProductSlug" class="form-label">Type</label>
      <input type="text" class="form-control" id="newProductSlug" name="slug" required >
    </div>
    <div class="mb-3">
      <label for="newProductCategory" class="form-label">Category</label>
      <select class="form-select" id="newProductCategory" name="category" required>
        <option value="">Select a category</option>
        <option value="school">Cours</option>
        <option value="school">Resource</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="newProductImage" class="form-label">Image</label>
      <input type="file" class="form-control" id="newProductImage" accept="image/png, image/gif, image/jpeg" name="image" required >
    </div>
    <div class="mb-3">
    <div class="mb-3">
      <label for="newProductDescription" class="form-label">Description</label>
      <input type="text" class="form-control" id="newProductDescription" name="description"  required>
    </div>
    <div class="mb-3">
      <button type="submit" class="btn btn-primary">New Product</button>
    </div>
  </form>
</div>
