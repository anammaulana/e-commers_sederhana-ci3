<section class="content-header">
    <h1> Edit Barang</h1>
</section>

<section class="content">
    <div class="box box-primary">
        <form role="form" action="<?= base_url('Barang/edit/' . $barang->id_barang); ?>" method="post" enctype="multipart/form-data">
            <div class="box-body">
                <div class="form-group">
                    <label for="nama">Nama Barang</label>
                    <input type="text" class="form-control" name="nama" value="<?= set_value('nama', $barang->nama_bar) ?>">
                    <?= form_error('nama', '<p class="text-red">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label for="category">Kategori</label>
                    <div>
                        <?= form_dropdown('category', $category, $barang->id_category) ?>
                    </div>
                    <?= form_error('category', '<p class="text-red">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label for="stok">Stok Barang</label>
                    <input type="text" class="form-control" name="stok" value="<?= set_value('stok', $barang->stok_bar) ?>">
                    <?= form_error('stok', '<p class="text-red">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label for="harga">Harga Barang</label>
                    <input type="text" class="form-control" name="harga" value="<?= set_value('harga', $barang->harga_bar) ?>">
                    <?= form_error('harga', '<p class="text-red">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar Barang</label>
                    <input type="file" class="form-control" name="gambar" id="gambar">
                    <?= form_error('gambar', '<p class="text-red">', '</p>'); ?>

                    <!-- Tampilkan gambar jika sudah ada -->
                    <?php if (!empty($barang->gambar)) { ?>
                        <img src="<?= base_url('uploads/image/' . $barang->gambar); ?>" alt="Gambar Barang" style="max-width: 200px; margin-top: 10px;">
                    <?php } ?>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('Barang') ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</section>
