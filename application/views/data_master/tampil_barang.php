<?php if ($this->session->flashdata('pesan')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('pesan') ?>
    </div>
<?php endif; ?>
<section class="content-header">
    <h1>Data Master</h1>
</section>

<section class="content">
    <ol class="breascrumb">
        <li><a href="<?= base_url('Barang/insert') ?>"><i class="fa fa-plus">Tambah Data</i></a></li>
    </ol>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> Barang</h3>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama Barang</th>
                                <th>Category</th>
                                <th>Stok barang</th>
                                <th>Harga barang</th>
                                <th>Foto barang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($barang as $data) {
                            ?>
                                <tr>
                                    <td><?= $data->id_barang ?></td>
                                    <td><?= $data->nama_bar ?></td>
                                    <?php
                                    // Temukan kategori yang sesuai dengan id_barang
                                    $foundCategory = null;
                                    foreach ($category as $cate) {
                                        if ($cate->id_category == $data->id_category) {
                                            $foundCategory = $cate;
                                            break; // Hentikan pencarian setelah menemukan kategori yang sesuai
                                        }
                                    }
                                    ?>
                                    <td><?= ($foundCategory) ? $foundCategory->category : 'Unknown Category' ?></td>
                                    <td><?= $data->stok_bar ?></td>
                                    <td><?= $data->harga_bar ?></td>
                                    <td><?= $data->gambar ?></td>
                                    <td>
                                        <a href="<?= base_url('Barang/edit/' . $data->id_barang); ?>">
                                            <button type="button" class="btn btn-primary btn-xs">Edit</button>
                                        </a>
                                        <a href="<?= base_url('Barang/delete/' . $data->id_barang); ?>">
                                            <button type="button" class="btn btn-primary btn-xs">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- <div>
                    <?= $this->session->flashdata('pesan'); ?>
                </div> -->
            </div>
        </div>
    </div>
</section>