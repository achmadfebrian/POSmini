<div class="p-3">
  <?= $this->session->flashdata('message'); ?>

  <div class="table-responsive p-3 bg-white rounded shadow-sm">
    <div class="d-flex justify-content-between">
      <div class="title fw-bold">Product table</div>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewProduct">Add new product</button>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Product name</th>
          <th scope="col">Category</th>
          <th scope="col">description</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>

        <?php $no = 1; ?>
        <?php foreach ($productList as $pl) : ?>
          <tr>
            <th scope="row"><?= $no; ?></th>
            <td><?= $pl['product_name']; ?></td>
            <td><?= $pl['category_name']; ?></td>
            <td>
              <span class="d-inline-block text-truncate" style="max-width: 150px;">
                <?= $pl['description']; ?>
              </span>
            </td>
            <td>
              <button class="btn btn-secondary editProduct" data-id="<?= $pl['id'] ?>" data-url="<?= base_url() ?>product/get_product_id" data-bs-toggle="modal" data-bs-target="#editProduct">Edit</button>

              <a href="<?= base_url() ?>product/delete?id=<?= $pl['id'] ?>" class="btn btn-danger" onclick="return confirm('Delete data?')">Delete</a>
            </td>
          </tr>
          <?php $no++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div>

<!-- Modal add -->
<div class="modal fade" id="addNewProduct" tabindex="-1" aria-labelledby="addNewProductLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addNewProductLabel">Add new product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url() ?>product/add" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="product-name" class="form-label">Product name</label>
            <input type="text" class="form-control" id="product-name" name="product-name" required>
          </div>

          <div class="mb-3">
            <label for="image" class="form-label">Default file input example</label>
            <input class="form-control" type="file" id="image" name="image" required>
          </div>

          <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="category" required>
              <option selected>Select Category</option>
              <?php foreach ($categoryList as $cl) : ?>
                <option value="<?= $cl['id'] ?>"><?= $cl['category_name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">IDR</span>
            <input type="number" class="form-control" name="price" aria-label="Amount (to the nearest dollar)" required>
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description" required></textarea>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add product</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal edit-->
<div class="modal fade" id="editProduct" tabindex="-1" aria-labelledby="editProductLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProductLabel">Edit product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url() ?>product/update" method="post" enctype="multipart/form-data">
          <!-- old image -->
          <input type="hidden" class="form-control" id="_old-image" name="_old-image" required>
          <input type="hidden" class="form-control" id="_id" name="_id" required>

          <div class="mb-3">
            <label for="_product-name" class="form-label">Product name</label>
            <input type="text" class="form-control" id="_product-name" name="_product-name" required>
          </div>

          <div class="mb-3">
            <label for="_image" class="form-label">Default file input example</label>
            <input class="form-control" type="file" id="_image" name="_image">
          </div>

          <div class="mb-3">
            <select class="form-select" aria-label="Default select example" id="_category" name="_category" required>
              <option selected>Select Category</option>
              <?php foreach ($categoryList as $cl) : ?>
                <option value="<?= $cl['id'] ?>"><?= $cl['category_name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text">IDR</span>
            <input type="number" class="form-control" id="_price" name="_price" aria-label="Amount (to the nearest dollar)" required>
          </div>

          <div class="mb-3">
            <label for="_description" class="form-label">Description</label>
            <textarea class="form-control" id="_description" rows="3" name="_description" required></textarea>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Changed</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="<?= base_url() ?>js/jquery-3.6.0.min.js"></script>
<script src="<?= base_url() ?>js/product.js"></script>