<?php ob_start();
include_once 'conn/koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM pengumuman ORDER BY tanggal DESC");


?>
<!DOCTYPE html>
<html>

<head>
    <title>Aplikasi Pengajuan Proposal Penelitian</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <link href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- ICONS -->
    <link rel="shortcut icon" href="img/logounitas.png">
    <style>
        @import url(https://fonts.googleapis.com/css?family=Lobster);
        @import url(https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css);

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

    <a href="index.php"> <i class="material-icons">navigate_before</i>Halaman Awal</a>
    <div style="padding-top: 20px;" class="">
        <h4 style="font-weight: bold; margin-left:10px">Pengumuman</h4>
        <div class="row center">
            <div class="col m2 s12">
                <div class="collection">
                    <a class="collection-item" href="pengumuman.php?tahun=2022">2022</a>
                    <a class="collection-item" href="pengumuman.php?tahun=2021">2021</a>
                    <a class="collection-item" href="pengumuman.php?tahun=2020">2020</a>
                </div>
            </div>

            <div class="col m10 s12">
                <?php if (@$_GET['tahun'] == "2022") {
                    include_once 'detail_pengumuman.php';
                } elseif (@$_GET['tahun'] == "2021") {
                    include_once 'detail_pengumuman.php';
                } elseif (@$_GET['tahun'] == "2020") {
                    include_once 'detail_pengumuman.php';
                }
                ?>
            </div>

        </div>
    </div>


</body>

</html>