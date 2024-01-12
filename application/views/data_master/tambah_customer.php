<section class="content-header">
    <h1> Tambah Customer</h1>
</section>

<section class="content">
    <div class="box box-primary">
        <form role="form" action="<?= base_url('Customer/insert'); ?>" method="post">
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
                    <label for="no_tlp">No Telpon</label>
                    <input type="text" class="form-control" name="no_tlp" id="no_tlp" value="<?= set_value('no_tlp') ?>">
                    <p class="text-red"><?= form_error('no_tlp') ?></p>
                </div>
                <div class="box-footer">
                    <button type="submit" name='tambah' class="btn btn-primary">Tambah</button>
                    <a href="<?= base_url('Customer') ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</section>
