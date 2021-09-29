<?php
session_start();
include '../conn/koneksi.php';
if (!isset($_SESSION['username'])) {
    header('location:../index.php');
} elseif ($_SESSION['data']['level'] != "reviewer") {
    header('location:../index.php');
}
$select = mysqli_query($koneksi, "SELECT * FROM pengumuman");
$count = mysqli_num_rows($select);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Aplikasi Unitas</title>
    <link rel="shortcut icon" href="../img/logounitas.png">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
            $('select').formSelect();
        });
    </script>
</head>

<body>
    <div class="row">
        <div class="col s12 m3">
            <ul id="slide-out" class="sidenav sidenav-fixed">
                <li>
                    <div class="user-view">
                        <div class="background">
                            <img src="">
                        </div>
                        <a href="#user"><img class="circle" src="../img/logounitas.png"></a>
                        <a href="#name"><span class="blue-text name"><?php echo ucwords($_SESSION['data']['nama_petugas']); ?><span style="color: white;" class="badge green">Reviewer</span></span></a>
                    </div>
                </li>
                <li><a href="index.php?p=dashboard"><i class="material-icons">dashboard</i>Dashboard</a></li>
                <li><a href="index.php?p=pengajuan"><i class="material-icons">report</i>Belum Review</a></li>
                <li><a href="index.php?p=ulasan"><i class="material-icons">question_answer</i>Telah di Review</a></li>
                <li><a href="index.php?p=proposal_diperbaiki"><i class="material-icons">assignment_late</i>Proposal Diperbaiki</a></li>
                <li>
                    <div class="divider"></div>
                </li>
                <li><a class="waves-effect" href="../index.php?p=logout"><i class="material-icons">logout</i>Logout</a></li>
            </ul>
            <a href="#" data-target="slide-out" class="btn sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
        <div class="col s12 m9">
            <?php
            if (@$_GET['p'] == "") {
                include_once 'dashboard.php';
            } elseif (@$_GET['p'] == "dashboard") {
                include_once 'dashboard.php';
            } elseif (@$_GET['p'] == "pengajuan") {
                include_once 'pengajuan.php';
            } elseif (@$_GET['p'] == "ulasan") {
                include_once 'ulasan.php';
            } elseif (@$_GET['p'] == "proposal_diperbaiki") {
                include_once 'proposalPerbaikan.php';
            } elseif (@$_GET['p'] == "ulasan_hapus") {
                $query = mysqli_query($koneksi, "DELETE FROM ulasan WHERE id_ulasan='" . $_GET['id_ulasan'] . "'");
                if ($query) {
                    echo "<script>alert('Berhasil!');</script>";
                    echo "<script>location='index.php?p=ulasan';</script>";
                }
            } ?>
        </div>
    </div>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
        });
    </script>
</body>

</html>