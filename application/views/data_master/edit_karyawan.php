<section class="content-header">
    <h1> Edit Karyawan</h1>
</section>

<section class="content">
    <div class="box box-primary">

        <form role="form" action="<?= base_url('Karyawan/edit/' . $karyawan->id_karyawan); ?>" method="post">
            <div class="box-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?= set_value('nama', $karyawan->nama_kar) ?>">
                    <?= form_error('nama', '<p class="text-red">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?= set_value('alamat', $karyawan->alamat_kar) ?>">
                    <?= form_error('alamat', '<p class="text-red">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" value="<?= set_value('username', $karyawan->username) ?>">
                    <?= form_error('username', '<p class="text-red">', '</p>'); ?>
                </div>
                <select class="form-control" name="role_id">
                    <option value="1" <?= set_select('role_id', '1', $karyawan->role_id == 1); ?>>Admin</option>
                    <option value="2" <?= set_select('role_id', '2', $karyawan->role_id == 2); ?>>User </option>
                    <!-- Add more options as needed -->
                    <?= form_error('role_id', '<p class="text-red">', '</p>'); ?>
                </select>


                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" value="<?= set_value('password') ?>">
                    <?= form_error('password', '<p class="text-red">', '</p>'); ?>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('Karyawan') ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</section>