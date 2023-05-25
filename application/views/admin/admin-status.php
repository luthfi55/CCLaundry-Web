<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

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

    <!-- Get json data -->

    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.table').DataTable();
        });
    </script>
    <!-- End get data json -->

    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/admin-status.css">

    <title>Laundry - Admin Status Page</title>

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item" style="padding-left: 40px;">
                    <a class="navbar-left" href="<?= base_url('admin/edit_order') ?>">Ubah Status</a>
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
                    <a class="" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" style="padding-right: 10px;">
                        <?php echo ($admin['username']) ?>
                    </a>
                    <img src="<?= base_url('assets/') ?>img/profile.png" width="50px" alt="" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?= base_url('admin/logout') ?>">Keluar</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container-fluid justify-content-center mt-5">
        <div class="row">            
            
            <div class="col-12">
                <div class="text-center">

                    <h1>Status Pesanan</h1>

                    <form method="POST">
                        <?php
                        $semua = 'semua';
                        $terima = 'terima';
                        $kurir_mengambil = 'kurir_mengambil';
                        $proses_cuci = 'proses_cuci';
                        $selesai_cuci = 'selesai_cuci';
                        $mengirim = 'mengirim';

                        $hasil = $query->result_array();
                        $title = 'Semua';
                        ?>
                        <input class="status_button" type="submit" name="<?php echo $semua ?>" value="Semua" id="submit"/>
                        <input class="status_button" type="submit" name="<?php echo $terima ?>" value="Pesanan diterima" id="submit"/>
                        <input class="status_button" type="submit" name="<?php echo $kurir_mengambil ?>" value="Kurir telah mengambil pesanan anda" id="submit"/>
                        <input class="status_button" type="submit" name="<?php echo $proses_cuci ?>" value="Pesanan anda sedang dalam proses pencucian" id="submit"/>
                        <input class="status_button" type="submit" name="<?php echo $selesai_cuci ?>" value="Pesanan anda telah selesai dicuci" id="submit"/>
                        <input class="status_button" type="submit" name="<?php echo $mengirim ?>" value="Pesanan anda sedang dalam pengiriman" id="submit"/>
                      
                    </form>

                    <?php if (isset($_POST[$terima])) {             
                        $title = 'Pesanan diterima';           
                        $hasil = $status_terima->result_array();    
                    }  else if (isset($_POST[$kurir_mengambil])) {
                        $title = 'Kurir telah mengambil pesanan anda';                                
                        $hasil = $status_kurir_mengambil->result_array();    
                    }   else if (isset($_POST[$proses_cuci])) {
                        $title = 'Pesanan anda sedang dalam proses pencucian';                                
                        $hasil = $status_proses_cuci->result_array();    
                    }   else if (isset($_POST[$selesai_cuci])) {
                        $title = 'Pesanan anda telah selesai dicuci';                                
                        $hasil = $status_selesai_cuci->result_array();    
                    }   else if (isset($_POST[$mengirim])) {
                        $title = 'Pesanan anda sedang dalam pengiriman';                                
                        $hasil = $status_mengirim->result_array();
                    }   else if (isset($_POST[$semua])) {
                        $title = 'Semua';                                
                        $hasil = $query->result_array();
                    }
                    ?>
                    <br>
                    <h5>Status: <?php echo $title ?></h5>
                    <br>
                    <table class="table">
                        <thead class="thead" id="thead">
                            <tr>
                                <th scope="col">Id Pesanan</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Paket Laundry</th>
                                <th scope="col">Berat Laundry</th>
                                <th scope="col">Paket Sepatu</th>
                                <th scope="col">Banyak Sepatu</th>
                                <th scope="col">Status</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Estimasi Selesai</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Edit Pesanan</th>
                            </tr>
                        </thead>
                        <tbody>                                                
                            <?php $i=1; foreach ($hasil as $data): ?>
                                <tr>
                                    <th><?= $data['id_pesanan'] ?></th>
                                    <th><?= $data['nama'] ?></th>
                                    <th><?= $data['paket_laundry'] ?></th>
                                    <th><?= $data['berat_laundry'] ?></th>
                                    <th><?= $data['paket_sepatu'] ?></th>
                                    <th><?= $data['banyak_sepatu'] ?></th>
                                    <th><?= $data['status'] ?></th>
                                    <th><?= $data['alamat_pesanan'] ?></th>
                                    <th><?= $data['estimasi'] ?></th>
                                    <th><?= 'Rp '.$data['total_harga'] ?></th>
                                    <td><a href="" data-toggle="modal" data-target="#exampleModalCenter<?=$data['id_pesanan']?>"> Edit </a></td>
                                </tr>                  
                            <?php $i++; endforeach ?>                              
                        </tbody>
                    </table>
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
                                    laundry khususnya <br> untuk mahasiswa telkom university dengan
                                    <br>
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
                                <li> <i class="uil uil-instagram-alt"></i> <a href="#"> : CandyCrush</a>
                                </li>
                                <li> <i class="uil uil-twitter"></i> <a href="#"> : CandyCrush</a></li>
                                <li> <i class="uil uil-browser"></i> <a href="#"> : Candycrush.com</a>
                                </li>

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
                        <p class="text-center">&copy; Copyright 2022 - City of Indonesia. All rights
                            reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

<?php $i=1; foreach ($query->result_array() as $data): ?>
<div class="modal fade" id="exampleModalCenter<?=$data['id_pesanan']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <?php $id = $data['id_pesanan'] ?>
    <form action="<?= base_url('admin/edit_status/'.$id) ?>" method="POST">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Pesanan</h5>
                <?php echo ($data['id_pesanan']) ?>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>Berat Laundry</label>
                <div class="input-group input-group-lg" id="input-area" style="padding-bottom:30px;">
                    <input name="berat_laundry" type="text" class="form-control" id="exampleInputName" placeholder=""
                        aria-describedby="inputGroup-sizing-lg" value="<?=$data['berat_laundry']?>">
                </div>
                <label>Banyak Sepatu</label>
                <div class="input-group input-group-lg" id="input-area" style="padding-bottom:30px;">
                    <input name="banyak_sepatu" type="text" class="form-control" id="exampleInputName" placeholder=""
                        aria-describedby="inputGroup-sizing-lg" value="<?=$data['banyak_sepatu']?>">
                </div>
                <label>Status Pesanan</label>
                <select class="custom-select" id="inputGroupSelect01" name="status">
                    <option value="Pesanan diterima" <?php if ($data['status'] == 'Pesanan diterima') echo 'selected';?>>
                        Pesanan diterima
                    </option>
                    <option value="Kurir telah mengambil pesanan anda" <?php if ($data['status'] == 'Kurir telah mengambil pesanan anda') echo 'selected';?>>
                        Kurir telah mengambil pesanan anda
                    </option>
                    <option value="Pesanan anda sedang dalam proses pencucian" <?php if ($data['status'] == 'Pesanan anda sedang dalam proses pencucian') echo 'selected';?>>
                        Pesanan anda sedang dalam proses pencucian
                    </option>
                    <option value="Pesanan anda telah selesai dicuci" <?php if ($data['status'] == 'Pesanan anda telah selesai dicuci') echo 'selected';?>>
                        Pesanan anda telah selesai dicuci
                    </option>
                    <option value="Pesanan anda sedang dalam pengiriman" <?php if ($data['status'] == 'Pesanan anda sedang dalam pengiriman') echo 'selected';?>>
                        Pesanan anda sedang dalam pengiriman
                    </option>
                    <option value="Pesanan anda telah selesai" <?php if ($data['status'] == 'Pesanan anda telah selesai') echo 'selected';?>>
                        Pesanan anda telah selesai
                    </option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
    </form>
</div>
<?php endforeach ?>