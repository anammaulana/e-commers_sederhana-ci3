<?php if ($this->session->flashdata('pesan')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('pesan') ?>
    </div>
<?php endif; ?>
<section class="content-header">
    <h1>Laporan Transaksi</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> Customer</h3>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Transaksi</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Pelanggan</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($laporan as $data) {
                            ?>
                                <tr>
                                    <td><?= $data->id_transaksi; ?></td>
                                    <td><?= $data->id_barang; ?></td>
                                    <td><?= $data->id_category; ?></td>
                                    <td><?= $data->id_cust; ?></td>
                                    <td><?= $data->jumlah; ?></td>
                                    <td><?= $data->total_harga; ?></td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                    <div class="box-footer">
                    <a href="<?= base_url('Home') ?>" class="btn btn-primary">Kembali</a>
                </div>
                </div>
                <!-- <div>
                    <?= $this->session->flashdata('pesan'); ?>
                </div> -->
            </div>
        </div>
    </div>
</section>