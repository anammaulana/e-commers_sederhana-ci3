<?php if ($this->session->flashdata('pesan')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('pesan') ?>
    </div>
<?php endif; ?>

<section class="content-header">
    <h1>Form Transaksi Penjualan</h1>
</section>

<section class="content">
    <div class="box box-primary">
        <form action="<?= base_url('Transaksi/proses_transaksi'); ?>" method="post">
            <div class="box-body">
                <div class="form-group">
                    <label for="nama_barang">Nama Barang:</label>
                    <select name="nama_barang" id="nama_barang" class="form-control">
                        <?php foreach ($barang as $item) : ?>
                            <option value="<?= $item->id_barang; ?>" data-harga-bar="<?= $item->harga_bar; ?>"><?= $item->nama_bar . ' - ' . $item->harga_bar; ?> (IDR)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="category">Kategori:</label>
                    <select class="form-control" name="category" id="category">
                        <?php foreach ($category as $cate) : ?>
                            <option value="<?= $cate->id_category; ?>"><?= $cate->category; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_cust">Pelanggan:</label>
                    <select class="form-control" name="nama_cust" id="nama_cust">
                        <?php foreach ($customer as $c) : ?>
                            <option value="<?= $c->id_cust; ?>"><?= $c->nama_cust; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah:</label>
                    <input class="form-control" type="number" name="jumlah" id="jumlah" required>
                </div>
                <div class="form-group">
                    <label for="total_harga">Total Harga:</label>
                    <input class="form-control" type="text" name="total_harga" id="total_harga" readonly>
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control">Proses Transaksi</button>
                </div>
            </div>
        </form>

        <!-- Tambahkan script JavaScript jika diperlukan untuk menghitung total harga berdasarkan jumlah -->

        <script>
            document.getElementById('jumlah').addEventListener('input', function() {
                var jumlah = this.value;
                var harga_barang = document.getElementById('nama_barang').options[document.getElementById('nama_barang').selectedIndex].getAttribute('data-harga-bar');
                var total_harga = jumlah * harga_barang;
                document.getElementById('total_harga').value = total_harga;
            });
        </script>
    </div>
</section>
