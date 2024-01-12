<section class="content-header">
    <h1> Tambah Barang</h1>
</section>

<section class="content">
    <div class="box box-primary">
        <form role="form" action="<?= base_url('Barang/insert'); ?>" method="post" enctype="multipart/form-data">
            <div class="box-body">
                <div class="form-group">
                    <label for="nama">Nama Barang</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= set_value('nama') ?>">
                    <p class="text-red"><?= form_error('nama') ?></p>
                </div>
                <div class="form-group">
                    <label for="category">Kategori</label>
                    <div>
                        <?= form_dropdown('category', $category) ?>
                    </div>
                    <p class="text-red"><?= form_error('category') ?></p>
                </div>
                <div class="form-group">
                    <label for="stok">Stok Barang</label>
                    <input type="text" class="form-control" name="stok" id="stok" value="<?= set_value('stok') ?>">
                    <p class="text-red"><?= form_error('stok') ?></p>
                </div>
                <div class="form-group">
                    <label for="harga">Harga Barang</label>
                    <input type="text" class="form-control" name="harga" id="harga" value="<?= set_value('harga') ?>">
                    <p class="text-red"><?= form_error('harga') ?></p>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar Barang</label>
                    <input type="file" class="form-control" name="gambar" id="gambar">
                    <p class="text-red"><?= form_error('gambar') ?></p>
                </div>
                <div class="box-footer">
                    <button type="submit" name='tambah' class="btn btn-primary">Tambah</button>
                    <a href="<?= base_url('Barang') ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</section>
