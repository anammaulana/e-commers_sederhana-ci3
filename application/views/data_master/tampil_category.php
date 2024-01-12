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
        <li><a href="<?= base_url('Category/insert') ?>"><i class="fa fa-plus">Tambah Data</i></a></li>
    </ol>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> Category</h3>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category</th>                              
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($category as $data) {
                            ?>
                                <tr>
                                    <td><?= $data->id_category?></td>
                                    <td><?= $data->category ?></td>
                                  
                                    <td>
                                        <a href="<?= base_url('Category/edit/'. $data->id_category); ?>">
                                            <button type="button" class="btn btn-primary btn-xs">Edit</button>
                                        </a>
                                        <a href="<?= base_url('Category/delete/' .$data->id_category); ?>">
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