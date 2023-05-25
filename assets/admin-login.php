<?php

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $pass = $_POST['password'];

    $str = file_get_contents('js/data.json');
    $json = json_decode($str, true);
    $users = $json['admin'];

    foreach ($users as $user) {
        $name = $user['username'];
        $password = $user['password'];
    }

    if ($username == $name && $pass == $password) {
        header("location: admin.php");
    } else {
?>

<div class="alert alert-danger" role="alert">
    Username atau kata sandi yang anda masukkan salah. Coba lagi!
</div>

<?php
    }
}

?>

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

    <link rel="stylesheet" href="css/admin-login.css">

    <title>Laundry - Admin Login</title>

</head>

<body>

    <div class="container-md">
        <div class="row" id="row" style="height: 500px;">
            <div class="col-2">
            </div>
            <div class="col-3">
                <img src="img/CCL.png" class="img" alt="">
            </div>
            <div class="col-5">
                <h1 class="login">
                    Admin Login
                    <hr />
                </h1>
                <form action="" method="POST">
                    <div class="input-group input-group-lg" id="input-area">
                        <input type="text" name="username" class="form-control" id="exampleInputName"
                            placeholder="Username" aria-describedby="inputGroup-sizing-lg">
                    </div>
                    <div class="input-group input-group-lg" id="input-area">
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Kata Sandi" aria-describedby="inputGroup-sizing-lg">
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" name="submit" class="btn btn-light btn-lg">Masuk</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-2">
            </div>
            <!--Google map-->
            <!-- <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3420.82778339846!2d107.63261178127382!3d-6.97368324526623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9adf177bf8d%3A0x437398556f9fa03!2sUniversitas%20Telkom!5e0!3m2!1sid!2sid!4v1667668305884!5m2!1sid!2sid"></iframe>         -->
            <!--Google Maps-->
        </div>
    </div>

</body>

</html>