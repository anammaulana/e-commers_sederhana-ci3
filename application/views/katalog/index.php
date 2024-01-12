<div class="container">
    <div class="row justify-content-center">
        <!-- Hero Section -->
        <section class="hero vh-100 mt-4">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 ">Welcome to Toko Simple</h1>
                    <p class="lead ">Discover the best deals on our wide range of products.</p>
                    <a href="<?= base_url('katalog/produk') ?>" class="btn btn-primary">Shop Now</a>
                </div>
                <div class="col-lg-6">
                    <!-- Carousel -->
                    <div id="productCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" style="height: 400px;">
                            <?php
                            $firstItem = true;
                            foreach ($barang_list as $index => $barang) { ?>
                                <div class="carousel-item <?= $firstItem ? 'active' : '' ?>">
                                    <img src="<?= base_url('uploads/image/' . $barang->gambar) ?>" class="d-block w-100 h-100" alt="Product Image">
                                    <!-- Tambahkan deskripsi atau informasi produk jika diperlukan -->
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 class="display-6 font-weight-bold "><?= $barang->nama_bar ?></h5>
                                        <p>Stok: <?= $barang->stok_bar ?></p>
                                    </div>
                                </div>
                                <?php $firstItem = false;
                            } ?>
                        </div>
                        <!-- Tombol Navigasi Carousel -->
                        <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
