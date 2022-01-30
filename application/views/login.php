<div class="login vh-100 vw-100">
  <div class="container">
    <div class="form-login p-5 rounded">
      <div class="logo mb-4 text-center">
        <img src="<?= base_url() ?>assets/web_image/POS mini.png" alt="logo">
      </div>

      <?= $this->session->flashdata('message'); ?>

      <form action="<?= base_url() ?>login" method="POST">
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" aria-describedby="emailHelp" required>
          <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
  </div>
</div>