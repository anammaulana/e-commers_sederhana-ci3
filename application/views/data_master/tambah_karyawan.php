<section class="content-header">
    <h1> Tambah Karyawan</h1>
</section>

<section class="content">
    <div class="box box-primary">
        <form role="form" action="<?= base_url('Karyawan/insert'); ?>" method="post">
            <div class="box-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= set_value('nama') ?>">
                    <p class="text-red"><?= form_error('nama') ?></p>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?= set_value('alamat') ?>">
                    <p class="text-red"><?= form_error('alamat') ?></p>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username') ?>">
                    <p class="text-red"><?= form_error('username') ?></p>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                    <p class="text-red"><?= form_error('password') ?></p>
                </div>
                <div class="box-footer">
                    <button type="submit" name='tambah' class="btn btn-primary">Tambah</button>
                    <a href="<?= base_url('Karyawan') ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</section>
