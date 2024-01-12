<?php if ($this->session->flashdata('pesan')): ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('pesan') ?>
    </div>
<?php endif; ?>
<section class="content-header">
    <h1>Data Master</h1>
</section>

<section class="content">
    <ol class="breascrumb">
        <li><a href="<?= base_url('Customer/insert') ?>"><i class="fa fa-plus">Tambah Data</i></a></li>
    </ol>
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
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No Telpon</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($customer as $data) {
                            ?>
                                <tr>
                                    <td><?= $data->id_cust?></td>
                                    <td><?= $data->nama_cust ?></td>
                                    <td><?= $data->alamat_cust?></td>
                                    <td><?= $data->no_tlp_cust ?></td>
                                    <td>
                                        <a href="<?= base_url('Customer/edit/'. $data->id_cust); ?>">
                                            <button type="button" class="btn btn-primary btn-xs">Edit</button>
                                        </a>
                                        <a href="<?= base_url('Customer/delete/' .$data->id_cust); ?>">
                                            <button type="button" class="btn btn-primary btn-xs">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php  } ?>
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