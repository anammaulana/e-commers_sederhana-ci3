<div class="register-box">
  <div class="register-logo">
    <a href="<?= base_url() ?>"><b>Toko Simple</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="<?= base_url('register/aksi_register') ?>" method="post">
    <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Full name" name="nama_kar">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?= form_error('nama_kar', '<p class="text-danger">', '</p>'); ?>
    </div>
    <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?= form_error('username', '<p class="text-danger">', '</p>'); ?>
    </div>
    <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?= form_error('password', '<p class="text-danger">', '</p>'); ?>
    </div>
    <div class="row">
        <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
    </div>
</form>


    <a href="<?= base_url('login') ?>" class="text-center">I already have a membership</a>
  </div>
</div>
