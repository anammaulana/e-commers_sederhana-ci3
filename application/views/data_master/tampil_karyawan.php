<?php if ($this->session->flashdata('pesan')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('pesan') ?>
    </div>
<?php endif; ?>

<section class="content-header">
    <h1>Data Master</h1>
</section>

<section class="content">
    <ol class="breadcrumb">
        <li><a href="<?= base_url('Karyawan/insert') ?>"><i class="fa fa-plus"></i> Tambah Data</a></li>
    </ol>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Karyawan</h3>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($karyawan as $data) : ?>
                                <tr>
                                    <td><?= $data->id_karyawan ?></td>
                                    <td><?= $data->nama_kar ?></td>
                                    <td><?= $data->alamat_kar ?></td>
                                    <td><?= $data->username ?></td>
                                    <td><?= $data->password ?></td>
                                    <td><?= ($data->role_id == 1) ? 'Admin' : 'User' ?></td>
                                    <td>
                                        <a href="<?= base_url('Karyawan/edit/' . $data->id_karyawan); ?>">
                                            <button type="button" class="btn btn-primary btn-xs">Edit</button>
                                        </a>
                                        <a href="<?= base_url('Karyawan/delete/' . $data->id_karyawan); ?>">
                                            <button type="button" class="btn btn-danger btn-xs">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>