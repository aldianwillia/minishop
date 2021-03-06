<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">

    <div class="container">

        <a href="<?= base_url() ?>" class="navbar-brand">
            <i class="fas fa-store text-primary"></i>
            <span class="brand-text font-weight-light"><b>Minihop Online</b></span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">

            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= base_url() ?>" class="nav-link">Home</a>
                </li>

                <!-- menampung data kategori didalam variabel kategori -->
                <?php $kategori = $this->m_home->get_all_data_kategori() ?>
                <!-- END -->

                <!--  Menu Kategori Dropdown -->
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Kategori</a>

                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">

                        <!-- perulangan pemanggilan data kategori-->
                        <?php foreach ($kategori as $key => $value) { ?>
                            <li><a href="<?= base_url('home/kategori/' . $value->id_kategori) ?>" class="dropdown-item"><?= $value->nama_kategori ?></a></li>
                        <?php } ?>
                        <!-- End Looping -->
                        
                    </ul>
                </li>
                <!-- Menu Kategori End Dropdown -->

                <li class="nav-item">
                    <a href="#" class="nav-link">Contact</a>
                </li>

                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>

                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li><a href="#" class="dropdown-item">Some action </a></li>
                        <li><a href="#" class="dropdown-item">Some other action</a></li>
                    </ul>
                </li>
            </ul>
            <!-- Left navbar links End -->

        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

            <!-- Messages Dropdown Menu -->
            <li class="nav-item">

                <a class="nav-link" data-toggle="dropdown" href="#">
                    <span class="brand-text font-weight-light">Pelanggan</span>
                    <img src="<?= base_url() ?>template/dist/img/user1-128x128.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                </a>

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>

                </div>

            </li>
            <!-- Messages Dropdown Menu End -->



            <li class="nav-item dropdown">

                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                    <a href="#" class="dropdown-item">

                        <!-- Message Start -->
                        <div class="media">
                            <img src="<?= base_url() ?>template/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->

                    </a>

                    <div class="dropdown-divider"></div>

                    <a href="#" class="dropdown-item">

                        <!-- Message Start -->
                        <div class="media">
                            <img src="<?= base_url() ?>template/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->

                    </a>

                    <div class="dropdown-divider"></div>

                    <a href="#" class="dropdown-item">

                        <!-- Message Start -->
                        <div class="media">
                            <img src="<?= base_url() ?>template/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->

                    </a>

                    <div class="dropdown-divider"></div>

                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>

                </div>

            </li>

        </ul>
        <!-- Right navbar links End -->

    </div>
</nav>
<!-- /.navbar -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">

        <!-- /.container-fluid -->
        <div class="container">

            <!-- /.row -->
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title ?></h1>
                </div>

                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">MiniShop</a></li>
                        <li class="breadcrumb-item"><a href="#"><?= $title ?></a></li>
                    </ol>
                </div>
                <!-- /.col End-->

            </div>
            <!-- /.row End -->

        </div>
        <!-- /.container-fluid End -->

    </div>
    <!-- /.content-header End -->



    <!-- Main content -->
    <div class="content">
        <div class="container">