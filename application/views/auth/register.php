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
    <!-- Font End -->

    <link rel="stylesheet" href="<?= base_url('assets/')?>css/register.css">
    <title>Laundry - Register Page</title>
</head>

<body>
    <div class="container-md">
        <div class="col-12">
            <div class="header">
                <img src="<?= base_url('assets/')?>img/CCL-register.png" class="mx-auto d-block" alt="">
            </div>
            <div class="content">
                <h1 class="text-center"> Buat Akun Baru </h1>
                <hr>

                <form method="post" action="<?= base_url('auth/register'); ?>">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" id="formGroupExampleInput"
                                    placeholder="Nama Lengkap" name="nama" value="<?= set_value('nama')?>">
                            </div>
                            <small class="text-danger"><?= form_error('nama'); ?></small>
                            
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control" id="formGroupExampleInput"
                                    placeholder=" Username" name="username" value="<?= set_value('username')?>">
                            </div>
                            <small class="text-danger"><?= form_error('username'); ?></small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="email" class="form-control" id="formGroupExampleInput2"
                                    placeholder="Email" name="email" value="<?= set_value('email')?>">
                            </div>
                            <small class="text-danger"><?= form_error('email'); ?></small>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input type="number" class="form-control" id="formGroupExampleInput2"
                                    placeholder="Nomor Seluler" name="no_telp" value="<?= set_value('no_telp')?>">
                            </div>
                            <small class="text-danger"><?= form_error('no_telp'); ?></small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="password" class="form-control" id="formGroupExampleInput2"
                                    placeholder="Kata Sandi Baru" name="password">
                            </div>
                            <small class="text-danger"><?= form_error('password'); ?></small>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input type="password" class="form-control" id="formGroupExampleInput2"
                                    placeholder="Ulang Kata Sandi" name="passconf" name="password" >
                            </div>
                            <small class="text-danger"><?= form_error('passconf'); ?></small>
                        </div>
                    </div>
                    <div>
                        <label for="">Jenis Kelamin: </label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1"
                                value="laki-laki">
                            <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2"
                                value="perempuan">
                            <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                        </div>
                        <small class="text-danger"><?= form_error('jenis_kelamin'); ?></small>
                    </div>
                    <div class="map">
                        <div class="row">                            
                            <div class="col">
                                <div class="form-group">
                                    <label for="" style="padding-bottom: 10px;">Masukkan alamat lengkap:</label>
                                    <div>
                                        <textarea id="user-message" class="form-control" cols="50"
                                            rows="4" placeholder="Alamat" name="alamat" value="<?= set_value('alamat')?>"></textarea>
                                    </div>
                                    <small class="text-danger"><?= form_error('alamat'); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="button-area">
                        <div class="col-md-12 text-center">
                            <div class="button-daftar">
                                <button type="submit" class="btn btn-light btn-lg">Daftar</button>
                            </div>
                            <a href="<?= base_url('auth')?>">
                                <p>Sudah punya akun? Masuk</p>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>