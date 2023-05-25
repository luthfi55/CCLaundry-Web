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
            <h3>Cuci kilat harga bersahabat</h3>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="card-deck">
                <div class="card">
                    <img src="<?= base_url('assets/') ?>img/laundry1.png " class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Buat Pesanan</h5>

                        <a href="<?= base_url('user/order') ?>" class="btn btn-primary">Masuk</a>
                    </div>
                </div>
                <?php $id = $user['id'];?>
                <div class="card">
                    <img src="<?= base_url('assets/') ?>img/laundry3.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lacak Pesanan</h5>

                        <a href="<?= base_url('user/track/'.$id) ?>" class="btn btn-primary">Masuk</a>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('assets/') ?>img/laundry2.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Riwayat Pesanan</h5>

                        <a href="<?= base_url('user/history/'.$id) ?>" class="btn btn-primary">Masuk</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <footer class="mainfooter sticky-bottom" role="contentinfo">
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
                    <li><a href="order.php">Buat Pesanan</a></li>
                    <li><a href="track-order.php">Lacak Pesanan</a></li>
                    <li><a href="history-order.php">Riwayat Pesanan</a></li>
                    <li><a href="edit-profile.php">Edit Profil</a></li>
                    
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
                <p class="text-center">&copy; Copyright 2022 - City of Indonesia.  All rights reserved.</p>
                </div>
            </div>
            </div>
        </div>
    </footer>    
</body>

</html>

</html>