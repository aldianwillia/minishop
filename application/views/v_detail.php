<!-- Default box -->
<div class="card card-solid ">
    <div class="bg-gray">
        <h3 class="text-center">
            <dt><?= $barang->nama_kategori ?></dt>
        </h3>
    </div>

    <!-- card-body -->
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="col-12">
                    <img src="<?= base_url('assets/gambar/' . $barang->gambar) ?>"  height="260px">
                </div>

                <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-2.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div>
                </div>
            </div>

            <div class="col-12 col-sm-6">
                <div class="card bg-secondary">
                    <div class="card body">
                        <span class="badge bg-success">
                            <h3 class="my-3 text-center text-gray-dark text-bold"><?= $barang->nama_barang ?></h3>
                        </span>
                    </div>

                    <p class="px-3"><?= $barang->deskripsi ?></p>

                    <div class=" py-4 px-3 mt-4">
                        <h4><span class="badge bg-success">Rp. <?= number_format($barang->harga,0) ?></span></h4>
                    </div>

                    <div class="mt-4 px-3 py-4">
                        <div class="btn btn-primary btn-lg btn-flat">
                            <i class="fas fa-cart-plus fa-lg mr-2"></i>
                            Add to Cart
                        </div>

                        <div class="btn btn-default btn-lg btn-flat">
                            <i class="fas fa-heart fa-lg mr-2"></i>
                            Add to Wishlist
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->