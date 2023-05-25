<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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

    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/edit-profile.css">

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
                      <a class="dropdown-item" href="#">Edit Profile</a>
                      <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Keluar</a>                      
                    </div>
                  </li>
            </ul>
        </div>
    </nav>
    <div class="container-md">     
        <div class="row">
            <div class="col-3">

            </div>
            <div class="col-6">
            <div class="content justify-content-center"> 
                <h1 class="text-center">Edit Profile</h1>                
                <hr>
                <?= $this->session->flashdata('message'); ?>
                <?php $id = $nama = $user['id']; ?>
                <form action="<?= base_url('user/ubah_profile/'.$id) ?>" method="POST">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Nama Lengkap:</label>                                                      
                            <?php $nama = $user['nama']; ?>      
                               <input type="text" style="white-space: pre;" class="form-control" id="formGroupExampleInput" name="nama" placeholder="Nama Lengkap" value='<?php echo($nama);?>' required >
                            </div>
                       </div>
                       <div class="col">
                           <div class="form-group">
                            <label for="">Username:</label>
                               <input type="text" class="form-control" id="formGroupExampleInput" name="username" placeholder=" Username" value=<?= $user['username']?> disabled>
                            </div>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col">
                           <div class="form-group">
                            <label for="">Email:</label>
                               <input type="email" class="form-control" id="formGroupExampleInput2" name="email" placeholder="Email" value=<?= $user['email'] ?> disabled>
                            </div>
                       </div>
                       <div class="col">
                           <div class="form-group">
                            <label for="">Nomor Seluler:</label>
                               <input type="text" class="form-control" id="formGroupExampleInput2" name="no_telp" placeholder="Nomor Seluler" value=<?= $user['no_telp']?> disabled>
                            </div>
                       </div>
                   </div>
              
                   <div class="map">
                       <div class="row">                           
                           <div class="col">
                               <div class="form-group">
                                   <label for="" style="padding-bottom: 10px;">Masukkan alamat lengkap:</label>
                                   <div>
                                       <textarea id="user-message" name="alamat_pesanan" class="form-control" cols="20" rows="4" placeholder="Alamat" required><?= $user['alamat']?> </textarea>
                                   </div>
                               </div>
                            </div> 
                        </div> 
                        <a href="" data-toggle="modal" data-target="#exampleModalCenter" style="color: black; font-size: 18px;">Ubah Password ?</a>
                   </div>                                 


                   <div class="button-area">
                       <div class="col-md-12 text-center">
                           <div class="button-daftar">
                               <button type="submit" class="btn btn-light btn-lg">Simpan Perubahan </button>
                            </div>                                       
                        </div>                    
                    </div>    
                </div>
            </div>
        </form>
            <div class="col-3">
                
            </div>
        </div>      
                
    </div>  

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
                <form action="<?= base_url('user/ubah_password/'.$id) ?>" method="POST">
                    <div class="modal-body">
                        <div class="map">
                            <div class="row">                            
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Kata Sandi Baru:</label>                                                              
                                        <input type="password"  class="form-control" id="formGroupExampleInput" name="password" placeholder=""  required >
                                        <br><br>
                                        <label for="">Ulang Kata Sandi:</label>                                                              
                                        <input type="password"  class="form-control" id="formGroupExampleInput" name="passconf" placeholder=""  required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="button1" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="button2" >Ubah password</button>
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
                    <li><a href="#">Ubah Status Pesanan</a></li>
                    <li><a href="#">Lihat Pesanan Selesai</a></li>
                    
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
                <p class="text-xs-center">&copy; Copyright 2022 - City of Indonesia.  All rights reserved.</p>
                </div>
            </div>
            </div>
        </div>
    </footer>    
</body>
</html>