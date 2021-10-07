<?php
include 'config/koneksi.php';

if (isset($_POST['simpan'])) {
    $nidn = htmlspecialchars($_POST["nidn"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $telp = htmlspecialchars($_POST["telp"]);
    $username = htmlspecialchars($_POST["username"]);
    $password = md5($_POST['password']);

    $result = mysqli_query($koneksi, "SELECT username FROM dosen WHERE username = '$username'");
    $result2 = mysqli_query($koneksi, "SELECT username FROM petugas WHERE username = '$username'");
    if (mysqli_fetch_assoc($result) || mysqli_fetch_assoc($result2)) {
        echo "<script>
                alert('Username sudah terdaftar!');
            </script>";
        echo "<script>window.location='register.php';</script>";
    } else {
        $password = md5($_POST['password']);
        $register = mysqli_query($koneksi, "INSERT INTO dosen (nidn,nama,username,password,telp) VALUES ('$nidn', '$nama', '$username', '$password','$telp')");
        if ($register) {
            echo "<script>alert('Daftar Berhasil')</script>";
            echo "<script>location='index.php'</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Daftar</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <link href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- ICONS -->

    <link rel="shortcut icon" href="assets/img/logounitas.png">
    <style>
        #loginhome {
            padding: 50px;
            width: 40%;
            margin: 0 auto;
            margin-top: 10%;
        }

        @media (min-width:100px) and (max-width: 600px) {

            #loginhome {
                width: 100%;
            }
        }

        .card-alert button {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            color: #fff;
            font-size: 20px;
            position: absolute;
            right: 10px;
            top: 15px;
            color: inherit;
        }

        .card-alert a {
            color: inherit;
            font-weight: 500;
        }

        .card-alert a:hover {
            color: inherit;
            text-decoration: underline;
        }
    </style>

</head>

<body>
    <div class="pengumuman">
        <div class="card-alert card green lighten-5">
            <div class="card-content green-text center">
                <strong>Baca</strong> Pengumuman Terbaru <a href="pengumuman.php?tahun=2021">Disini.</a>
            </div>
            <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    </div>
    <div class="container">
        <div id="loginhome" class="card">
            <div style="text-align: center;" class="logounitas"><img width="150px" src="img/logounitas.png" alt=""></div>
            <form method="POST">
                <div class="input_field">
                    <label for="username">NIDN</label>
                    <input id="username" type="number" name="nidn" required>
                </div>
                <div class="input_field">
                    <label for="username">Nama</label>
                    <input id="username" type="text" name="nama" required>
                </div>
                <div class="input_field">
                    <label for="username">No Telepon</label>
                    <input id="username" type="number" name="telp" required>
                </div>
                <div class="input_field">
                    <label for="username">Username</label>
                    <input id="username" type="text" name="username" required>
                </div>
                <div class="input_field">
                    <label for="username">Password</label>
                    <input id="username" type="password" name="password" required>
                </div>
                <!-- <input type="submit" name="login" value="Login" class="btn green" style="width: 100%;"> -->
                <button type="submit" name="simpan" value="simpan" class="btn green" style="width: 100%;">Daftar</button>
            </form>
            <center><small>Sudah punya Akun? Login <a style="font-weight :bold;" href="index.php">Disini</a></small></center>
        </div>

    </div>
    <script>
        $(document).ready(function() {
            $('.card-alert > button').on('click', function() {
                $(this).closest('div.card-alert').fadeOut('slow');
            })
        })
    </script>
</body>

</html>