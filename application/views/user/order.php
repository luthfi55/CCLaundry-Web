<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <!-- Bootstrap End  -->


    <!-- Font -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Baloo+2&family=Fredoka+One&family=Poppins:wght@200;500&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- Font End -->

    <!-- icon -->

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- end icon -->


    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/order.css">

    <title>Laundry - Landing Page</title>

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item" style="padding-left: 40px;">
                    <a class="navbar-left" href="<?= base_url('user/order') ?>">Buat Pesanan</a>
                </li>
                <li class="nav-item">
                    <?php $id = $user['id'];?>
                    <a class="navbar-left" href="<?= base_url('user/track/'.$id) ?>">Lacak Pesanan</a>
                </li>
                <li class="nav-item">
                    <a class="navbar-left" href="<?= base_url('user/history/'.$id) ?>">Riwayat Pesanan</a>
                </li>
            </ul>
        </div>

        <div class="mx-auto order-0">
            <a class="navbar-brand" href="<?= base_url('user') ?>">
                <img src="<?= base_url('assets/') ?>img/CCL-homepage.png" width="200" height="50" class="d-inline-block align-top" alt="">
            </a>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown" style="padding-right: 40px;">
                    <a class="" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" style="padding-right: 10px;">
                        <?= $user['nama'] ?>
                    </a>
                    <img src="<?= base_url('assets/') ?>img/profile.png" width="50px" alt="" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?= base_url('user/edit') ?>">Edit Profile</a>
                        <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Keluar</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    
    <?= $this->session->flashdata('message'); ?>

    <form action="<?= base_url('user/tambah_order')?>" method="POST">
    <div class="container-fluid">
        <div class="row justify-content-center mx-auto">
            <div class="col-3" id="how-order">
                <h1 class="text-center">
                    Cara Pemesanan
                </h1>
                <ol class="">
                    <li>Pilih alamat pengambilan laundry.</li>
                    <li>Pilih jenis paket laundry yang di inginkan.</li>
                    <li>Tekan pesan jika pesanan sudah sesuai dengan yang di inginkan.</li>
                    <li>Tunggu 15-30 menit kurir akan datang menuju tempat kamu untuk mengambil pakaian/sepatu.</li>
                    <li>Cek status orderan anda pada Lacak Pesanan yang ada pada bagian atas.</li>
                    <li>Hubungi nomor 0812345678910 melalui whatsapp jika terdapat masalah pada pesanan anda.</li>
                </ol>
            </div>
            
            <form action="<?= base_url('user/tambah_order') ?>" method="POST">

            <div class="col-4" id="order">
                <h1 class="text-center">
                    Pesan                    
                </h1>
                <label class="label font-weight-bold">Alamat Sekarang:</label>
                <br>
                <label class="label pb-2" ><?= $user['alamat'] ?></label>
                <br>
                <a href="" data-toggle="modal" data-target="#exampleModalCenter" class="address">
                    Ganti alamat?
                </a>
                <br><br>
                <label for="" class="label">Pilih paket pakaian:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01" id="label">Pilih</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="paket_laundry">
                        <option value="None">None</option>
                        <option value="Reguler">Reguler</option>
                        <option value="Express">Express</option>
                        <option value="Super Express">Super Express</option>
                    </select>
                </div>
                <label for="" class="label" id="paket-sepatu">Pilih paket sepatu:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01" id="paket-sepatu2">Pilih</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="paket_sepatu">
                        <option value="None">None</option>
                        <option value="Reguler">Reguler</option>
                        <option value="Express">Express</option>
                        <option value="Super Express">Super Express</option>
                    </select>                                     
                </div>                
                <div class="button-pesan mb-5">
                    <div class="text-center">
                        <button type="submit" class="btn btn-light"
                            id="button-pesan">Buat Pesanan</button>
                    </div>
                </div>
            </div>

            </form>
            
            <div class="col-3" id="price">
                <h1 class="text-center">
                    Jenis Paket & Harga
                </h1>
                <h2>Paket Laundry Pakaian</h2>
                <ul class="jenis">
                    <li>Super Express - 3 Jam Pengerjaan - 15.000/kg</li>
                    <li>Express - 12 Jam Pengerjaan - 10.000/kg</li>
                    <li>Reguler - 48 Jam Pengerjaan - 5.000/kg</li>
                </ul>
                <h2 class="sepatu">Paket Laundry Sepatu</h2>
                <ul class="jenis">
                    <li>Super Express - 12 Jam Pengerjaan - 15.000/kg</li>
                    <li>Express - 24 Jam Pengerjaan - 10.000/kg</li>
                    <li>Reguler - 72 Jam Pengerjaan - 5.000/kg</li>
                </ul>
            </div>
        </div>
        <div class="col-1">
        </div>
    </div>
    </div>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Ganti Alamat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php $id = $user['id'];                
                ?>
                <form action="<?= base_url('user/ubah_alamat/'.$id) ?>" method="POST">
                    <div class="modal-body">
                        <div class="map">
                            <div class="row">                            
                                <div class="col">
                                    <div class="form-group">
                                        <label for="" style="padding-bottom: 30px;">Masukkan alamat lengkap:</label>
                                        <div>
                                            <textarea name="alamat_pesanan" id="user-message" class="form-control" cols="20"
                                                rows="8" placeholder="Masukkan Alamat Baru" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="button1" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="button2" >Gunakan Alamat Ini</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal -->

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
                        <p class="text-center">&copy; Copyright 2022 - City of Indonesia. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>