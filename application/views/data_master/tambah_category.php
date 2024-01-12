<section class="content-header">
    <h1> Tambah Customer</h1>
</section>

<section class="content">
    <div class="box box-primary">
        <form role="form" action="<?= base_url('Category/insert'); ?>" method="post">
            <div class="box-body">
                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" class="form-control" name="category" id="category" value="<?= set_value('category') ?>">
                    <p class="text-red"><?= form_error('category') ?></p>
                </div>
                <div class="box-footer">
                    <button type="submit" name='tambah' class="btn btn-primary">Tambah</button>
                    <a href="<?= base_url('Category') ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</section>
