<section class="content-header">
    <h1> Edit Category</h1>
</section>

<section class="content">
    <div class="box box-primary">

        <form role="form" action="<?= base_url('Category/edit/' . $category->id_category); ?>" method="post">
            <div class="box-body">
                <div class="form-group">
                    <label for="">category</label>
                    <input type="text" class="form-control" name="category" value="<?= set_value('category', $category->category) ?>">
                    <?= form_error('category', '<p class="text-red">', '</p>'); ?>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('Category') ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</section>
