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

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/');?>js/main.js"></script>

    <link rel="stylesheet" href="<?= base_url('assets/');?>css/login.css">

    <title>Laundry - Login Page</title>

</head>

<body>
    <?= $this->session->flashdata('message'); ?>
    <div class="container-md">
        <div class="row" id="row" style="height: 500px;">
            <div class="col-2">
            </div>
            <div class="col-3">
                <img src="<?= base_url('assets/');?>img/CCL.png" class="img" alt="">
            </div>
            <div class="col-5">
                <h1 class="login">
                    Login
                    <hr />
                </h1>
                <form action="<?= base_url('auth') ?>" method="POST">                                                   
                    <div class="input-group input-group-lg" id="input-area">
                        <input name="username" type="text" class="form-control" id="exampleInputName"
                            placeholder="Username" aria-describedby="inputGroup-sizing-lg">
                    </div>
                    <div class="input-group input-group-lg" id="input-area">
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Kata Sandi" aria-describedby="inputGroup-sizing-lg">
                    </div>
                    <div class="row"> 
                        <div class="col"> 
                            <button type="submit" name="submit" class="btn btn-light btn-lg">Masuk</button>
                        </div>
                        <div class="col">
                            <div class="media">
                                <div class="media-body">
                                </div>
                                <a href="<?= base_url('auth/register') ?>">
                                    <p>Belum punya akun? Daftar</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-2">
            </div>
        </div>
    </div>
</body>

</html>