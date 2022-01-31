<div class="p-3">
  <?= $this->session->flashdata('message'); ?>

  <div class="table-responsive p-3 bg-white rounded shadow-sm">
    <div class="d-flex justify-content-between">
      <div class="title fw-bold">Category table</div>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewCategory">Add new product</button>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Category name</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>

        <?php $no = 1; ?>
        <?php foreach ($categoryList as $cl) : ?>
          <tr>
            <th scope="row"><?= $no; ?></th>
            <td><?= $cl['category_name']; ?></td>
            <td>
              <button class="btn btn-secondary editCategory" data-id="<?= $cl['id'] ?>" data-url="<?= base_url() ?>category/get_category_id" data-bs-toggle="modal" data-bs-target="#editCategory">Edit</button>

              <a href="<?= base_url() ?>category/delete?id=<?= $cl['id'] ?>" class="btn btn-danger" onclick="return confirm('Delete data?')">Delete</a>
            </td>
          </tr>
          <?php $no++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div>

<!-- Modal add -->
<div class="modal fade" id="addNewCategory" tabindex="-1" aria-labelledby="addNewCategoryLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addNewCategoryLabel">Add new product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url() ?>category/add" method="post">
          <div class="mb-3">
            <label for="category-name" class="form-label">Category name</label>
            <input type="text" class="form-control" id="category-name" name="category-name" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add category</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal edit-->
<div class="modal fade" id="editCategory" tabindex="-1" aria-labelledby="editCategory" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editCategory">Edit product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url() ?>category/update" method="post">
          <!-- old image -->
          <input type="hidden" class="form-control" id="_id" name="_id" required>

          <div class="mb-3">
            <label for="_category-name" class="form-label">Category name</label>
            <input type="text" class="form-control" id="_category-name" name="_category-name" required>
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
<script src="<?= base_url() ?>js/category.js"></script>