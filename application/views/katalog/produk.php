<!-- File: views/katalog_produk.php -->
<div class="container">
    <h1 class="mt-4">Semua Produk</h1>
    <div class="col-14 d-flex justify-content-center">
        <div class="row">
            <?php foreach ($barang_list as $barang) { ?>
                <div class="card mt-4 me-3" style="width: 18rem;">
                    <img src="<?php echo base_url('uploads/image/' . $barang->gambar); ?>" class="card-img-top" alt="..."
                        style="width: 100%; height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $barang->nama_bar; ?></h4>
                        <p class="card-text">Stok: <?php echo $barang->stok_bar; ?></p>
                        <p class="card-text">Harga: Rp. <?php echo $barang->harga_bar; ?></p>
                        <!-- Tambahkan formulir dan tombol order -->
                        <form id="orderForm_<?php echo $barang->id_barang; ?>" class="mb-3">
                            <div class="mb-2">
                                <label for="quantity_<?php echo $barang->id_barang; ?>">Jumlah Barang:</label>
                                <input type="number" name="quantity" id="quantity_<?php echo $barang->id_barang; ?>" class="form-control" min="1" value="1" onchange="updateTotal('<?php echo $barang->id_barang; ?>', <?php echo $barang->harga_bar; ?>)">
                            </div>
                            <div class="mb-2">
                                <p>Total Harga: <span id="totalPrice_<?php echo $barang->id_barang; ?>"><?php echo $barang->harga_bar; ?></span></p>
                            </div>
                            <a href="javascript:void(0);" onclick="order('<?php echo $barang->id_barang; ?>', '<?php echo $barang->nama_bar; ?>', <?php echo $barang->harga_bar; ?>);" class="btn btn-primary">Order</a>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk mengupdate total harga saat nilai input jumlah barang berubah
    function updateTotal(barangId, hargaBar) {
        var quantity = parseInt(document.getElementById('quantity_' + barangId).value);
        var totalHarga = quantity * hargaBar;
        document.getElementById('totalPrice_' + barangId).innerText = totalHarga;
    }

    // Fungsi untuk menghitung total harga dan mengirim pesan order ke WhatsApp
    function order(barangId, namaBarang, hargaBar) {
        var quantity = parseInt(document.getElementById('quantity_' + barangId).value);
        var totalHarga = quantity * hargaBar;

        // Tautan WhatsApp dengan parameter pesan yang mencakup informasi pesanan
        var whatsappLink = 'https://wa.me/083114237048?text=Saya%20ingin%20order%20' +
            namaBarang + ',%20Jumlah:%20' + quantity + ',%20Total:%20Rp.' + totalHarga;

        // Redirect ke tautan WhatsApp
        window.location.href = whatsappLink;
    }
</script>
