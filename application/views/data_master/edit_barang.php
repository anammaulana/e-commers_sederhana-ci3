<section class="content-header">
    <h1> Edit Barang</h1>
</section>

<section class="content">
    <div class="box box-primary">

        <form role="form" action="<?= base_url('Barang/edit/' . $barang->id_barang); ?>" method="post">
            <div class="box-body">
                <div class="form-group">
                    <label for="">Nama Barang</label>
                    <input type="text" class="form-control" name="nama" value="<?= set_value('nama', $barang->nama_bar) ?>">
                    <?= form_error('nama', '<p class="text-red">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Category</label>
                    <div>
                    <?= form_dropdown('category', $category, $barang->id_category) ?>
                    </div>
                    <?= form_error('category', '<p class="text-red">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Stok Barang</label>
                    <input type="text" class="form-control" name="stok" value="<?= set_value('stok', $barang->stok_bar) ?>">
                    <?= form_error('stok', '<p class="text-red">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Harga Barang</label>
                    <input type="text" class="form-control" name="harga" value="<?= set_value('harga', $barang->harga_bar) ?>">
                    <?= form_error('harga', '<p class="text-red">', '</p>'); ?>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('Barang') ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</section>
