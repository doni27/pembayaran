<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Sistem pembayaran</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?=base_url()?>/template/assets/css/style.css">
    <link rel="stylesheet" href="<?=base_url()?>/template/assets/css/components.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


</head>

<body>
    <div id="app">
        <div class="main-wrapper">


            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                            data-width="250">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        <div class="search-backdrop"></div>
                        <div class="search-result">
                            <div class="search-header">
                                Histories
                            </div>
                            <div class="search-item">
                                <a href="#">How to hack NASA using CSS</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-item">
                                <a href="#">Kodinger.com</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-item">
                                <a href="#">#Stisla</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-header">
                                Result
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30"
                                        src=".<?=base_url()?>/template/assets/stisla-master/assets/img/products/product-3-50.png"
                                        alt="product">
                                    oPhone S9 Limited Edition
                                </a>
                            </div>
                            <!-- <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="<?=base_url()?>/template/assets/stisla-master/assets/img/products/product-2-50.png" alt="product">
                  Drone X2 New Gen-7
                </a>
              </div> -->
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30"
                                        src="<?=base_url()?>/template/assets/stisla-master/assets/img/products/product-1-50.png"
                                        alt="product">
                                    Headphone Blitz
                                </a>
                            </div>
                            <div class="search-header">
                                Projects
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <div class="search-icon bg-danger text-white mr-3">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    Stisla Admin Template
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <div class="search-icon bg-primary text-white mr-3">
                                        <i class="fas fa-laptop"></i>
                                    </div>
                                    Create a new Homepage Design
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">

                            <div class="d-sm-none d-lg-inline-block">  <?=  session('username')  ?> </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                      
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url('auth/logout')?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout 
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <?php
    $local_session = \Config\Services::session(); // Needed for Point 5
?>

            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?= base_url('/')?>"><?=  session('role')  ?></a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="<?= base_url('/')?>"></a>
                    </div>
                    <ul class="sidebar-menu"> 
                    <?php if ( session('role') == 'bendahara') : ?>
                        <li><a href="<?= base_url('/')?>"><i class="fas fa-th"></i> <span>Dashboard </span></a></li>
                       
                        <li><a href="<?= base_url('pembayaran')?>"><i class="fas fa-th"></i> <span>Pembayaran</span></a>
                        </li>
                        <li><a href="<?= base_url('mahasiswa')?>"><i class="fas fa-th"></i> <span>Mahasiswa</span></a>
                        </li>
                        <li><a href="<?= base_url('tagihan')?>"><i class="fas fa-th"></i> <span>Tagihan</span></a></li>
                        <li><a href="<?= base_url('pengguna')?>"><i class="fas fa-th"></i> <span>Pengguna</span></a>
                        </li>
                <?php endif ?>
                    <?php if ( session('role') == 'pimpinan') : ?>
                        <li><a href="<?= base_url('/')?>"><i class="fas fa-th"></i> <span>Dashboard </span></a></li>
                       
                        <li><a href="<?= base_url('pembayaran')?>"><i class="fas fa-th"></i> <span>Pembayaran</span></a>
                        </li>
                        <li><a href="<?= base_url('mahasiswa')?>"><i class="fas fa-th"></i> <span>Mahasiswa</span></a>
                        </li>
                        <li><a href="<?= base_url('tagihan')?>"><i class="fas fa-th"></i> <span>Tagihan</span></a></li>
                        <li><a href="<?= base_url('pengguna')?>"><i class="fas fa-th"></i> <span>Pengguna</span></a>
                        </li>
                <?php endif ?>
                <?php if ( session('role') == 'mahasiswa') : ?>
                        <li><a href="<?= base_url('tagihan/tagihan_mahasiswa')?>"><i class="fas fa-th"></i>
                                <span>Tagihan</span></a></li>

                        <?php endif ?>
                        <li><a href="<?= base_url('auth/logout')?>"><i class="fas fa-th"></i> <span>Logout</span></a></li>
                    </ul>

                </aside>
            </div>



            <div class="main-content">
            <?= $this->renderSection('content') ?>
            </div>
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; 2018 2022
            </div>
            <div class="footer-right">
                2.3.0
            </div>
        </footer>
    </div>


    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?=base_url()?>/template/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="<?=base_url()?>/template/assets/js/scripts.js"></script>
    <script src="<?=base_url()?>/template/assets/js/custom.js"></script>
    <?= $this->renderSection('script') ?>
    <!-- Page Specific JS File -->
</body>

</html>
