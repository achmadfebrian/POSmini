<div class="p-3">

  <h4 class="title">Product</h4>
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach ($productList as $pl) : ?>
      <div class="col">
        <div class="card h-100">
          <img src="<?= base_url() ?>assets/product_image/<?= $pl['image'] ?>" class="card-img-top" alt="<?= $pl['image'] ?>">
          <div class="card-body">
            <h5 class="card-title text-center"><?= $pl['product_name'] ?></h5>
            <h4 class="card-price text-center"><?= $pl['price'] ?></h4>
            <p class="card-text"><?= $pl['description'] ?></p>
          </div>
          <div class="my-3 text-center">
            <button class="btn btn-primary">Buy</button>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>