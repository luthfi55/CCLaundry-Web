<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <!-- Bootstrap End  -->

    <!-- Font -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2&family=Fredoka+One&family=Poppins:wght@200;500&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- Font End -->

    <!-- icon -->

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- end icon -->

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/') ?>js/main.js"></script>

    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/admin.css">

    <title>Laundry - Admin Page</title>

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item" style="padding-left: 40px;">
                    <a class="navbar-left" href="<?= base_url('admin/edit_order') ?>"">Ubah Status</a>
                </li>
                <li class="nav-item">
                    <a class="navbar-left" href="<?= base_url('admin/pesanan_selesai') ?>">Pesanan Selesai</a>
                </li>
            </ul>
        </div>

        <div class="mx-auto order-0">
            <a class="navbar-brand" href="<?= base_url('admin/admin_page') ?>">
                Admin Dashboard
            </a>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown" style="padding-right: 40px;">
                    <a class="" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-right: 10px;">
                        <?= ($admin['username']) ?>
                    </a>
                    <img src="<?= base_url('assets/') ?>img/profile.png" width="50px" alt="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?= base_url('admin/logout') ?>">Keluar</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <section id="hero_section">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                    <img src="<?= base_url('assets/') ?>img/laundry2.png" class="d-block w-100" alt="img/laundry1.jpg">
                </div>
                <div class="carousel-item active">
                    <img src="<?= base_url('assets/') ?>img/laundry1.png" class="d-block w-100" alt="img/laundry1.jpg">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/') ?>img/laundry3.png" class="d-block w-100" alt="img/laundry1.jpg">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </section>
    <div class="container-md">
        <div class="text-center">
            <h1>CandyCrush Laundry</h1>
            <!-- <button onclick="location.href='order.php'" class="btn btn-dark btn-lg">Ubah Status</button>
            <button onclick="location.href='order.php'" class="btn btn-dark btn-lg">Oderan Selesai</button> -->
        </div>
    </div>
    <div>
        <div class="container-fluid justify-content-center">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-3">
                    <div class="card">
                        <img src="<?= base_url('assets/') ?>img/laundry2.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Ubah Status Pesanan</h5>
                            <a href="<?= base_url('admin/edit_order') ?>" class="btn btn-primary">Masuk</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <img src="<?= base_url('assets/') ?>img/laundry3.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Lihat Pesanan Selesai</h5>
                            <a href="<?= base_url('admin/pesanan_selesai') ?>" class="btn btn-primary">Masuk</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <footer class="mainfooter" role="contentinfo">
        <div class="footer-top p-y-2">

        </div>
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <!--Column1-->
                        <div class="footer-pad">
                            <h4>Alamat</h4>
                            <address>
                                <ul class="list-unstyled">
                                    <li>
                                        Sukapura<br>
                                        Rt.11 No.67<br>
                                        Jawa Barat<br>
                                        Indonesia<br>
                                    </li>
                                    <li>
                                        Phone: 08123456789
                                    </li>
                                </ul>
                            </address>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <!--Column1-->
                        <div class="footer-pad">
                            <h4>Layanan Populer</h4>
                            <ul class="list-unstyled">
                                <li><a href="#"></a></li>
                                <li><a href="<?= base_url('admin/edit_order') ?>">Ubah Status Pesanan</a></li>
                                <li><a href="<?= base_url('admin/pesanan_selesai') ?>">Lihat Pesanan Selesai</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <!--Column1-->
                        <div class="footer-pad">
                            <h4>Informasi Website</h4>
                            <ul class="list-unstyled">
                                <li>
                                    Website yang
                                    menyediakan jasa
                                    laundry khususnya <br> untuk mahasiswa telkom university dengan <br>
                                    pemesanan secara
                                    online
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <!--Column1-->
                        <div class="footer-pad">
                            <h4>Sosial Media</h4>
                            <ul class="list-unstyled">
                                <li> <i class="uil uil-instagram-alt"></i> <a href="#"> : CandyCrush</a></li>
                                <li> <i class="uil uil-twitter"></i> <a href="#"> : CandyCrush</a></li>
                                <li> <i class="uil uil-browser"></i> <a href="#"> : Candycrush.com</a></li>

                                <li>
                                    <a href="#"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!--Footer Bottom-->
                        <p class="text-center">&copy; Copyright 2022 - City of Indonesia. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>