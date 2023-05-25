<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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

    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/history-order.css">

    <!-- Data Table -->
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready( function () {
        $('.table').DataTable();
      });
    </script>

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
                    <a class="" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-right: 10px;">                    
                    <?= $user['nama']?>
                    </a>
                    <img src="<?= base_url('assets/') ?>img/profile.png" width="50px" alt="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="<?= base_url('user/edit') ?>">Edit Profile</a>
                      <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Keluar</a>                      
                    </div>
                  </li>
            </ul>
        </div>
    </nav>
    
    <div class="container-fluid justify-content-center mt-5">
      <div class="row">
        <div class="col-1">

        </div>
        <div class="col-10">
        <div class="text-center">
                    <h1>Pesanan Anda</h1>
                    <table class="table">
                        <thead class="thead" id="thead">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Paket Laundry</th>
                                <th scope="col">Berat Laundry</th>
                                <th scope="col">Paket Sepatu</th>
                                <th scope="col">Banyak Sepatu</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Status</th>
                                <th scope="col">Estimasi</th>
                                <th scope="col">Total Harga</th>                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($pesanan as $data): ?>
                            <tr>
                            <th><?= $i ?></th>
                                <th><?= $data['paket_laundry'] ?></th>
                                <th><?= $data['berat_laundry'] ?></th>
                                <th><?= $data['paket_sepatu'] ?></th>
                                <th><?= $data['banyak_sepatu'] ?></th>
                                <th><?= $data['alamat_pesanan'] ?></th>
                                <th><?= $data['status'] ?></th>
                                <th><?= $data['estimasi'] ?></th>
                                <th><?= $data['total_harga'] ?></th>                                
                            </tr>
                            <?php $i++; endforeach ?>
                        </tbody>
                    </table>
                </div>
        </div>
        <div class="col-1">

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