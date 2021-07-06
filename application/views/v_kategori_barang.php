<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider1.jpg">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider2.jpg">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider3.jpg">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider4.jpg">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row d-flex align-items-stretch">


            <?php foreach ($barang as $key => $value) { ?>


                <div class="col-sm-4 d-flex align-items-stretch">
                    <div class="card bg-gray-light">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h5 class="text text-bold text-center"><b><?= $value->nama_barang ?></b></h5>
                            </div>
                        </div>
                        <h5 class="text-muted text-center"><?= $value->nama_kategori ?></h5>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <img src="<?= base_url('/assets/gambar/' . $value->gambar) ?>" alt="" class=" img-fluid" width="310px" height="100px">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-secondary">
                            <div class="row">
                                <div class='col-sm-6'>
                                    <div class="text-left">
                                        <h4><span class="badge bg-success">Rp. <?= number_format($value->harga, 0) ?></span></h4>
                                    </div>
                                </div>
                                <div class='col-sm-6'>
                                    <div class="text-right">
                                        <a href="#" class="btn btn-sm btn-success">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-primary">
                                            <i class="fas fa-cart-plus"> Order</i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>
    </div>
</div>