<section class="content-header">
    <h1> Edit Customer</h1>
</section>

<section class="content">
    <div class="box box-primary">

        <form role="form" action="<?= base_url('Customer/edit/' . $customer->id_cust); ?>" method="post">
            <div class="box-body">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?= set_value('nama', $customer->nama_cust) ?>">
                    <?= form_error('nama', '<p class="text-red">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?= set_value('alamat', $customer->alamat_cust) ?>">
                    <?= form_error('alamat', '<p class="text-red">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label for="">No Telpon</label>
                    <input type="text" class="form-control" name="no_tlp" value="<?= set_value('no_tlp', $customer->no_tlp_cust) ?>">
                    <?= form_error('no_tlp', '<p class="text-red">', '</p>'); ?>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('Customer') ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</section>
