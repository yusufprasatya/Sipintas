<?php ob_start();
session_start();
include '../../config/koneksi.php';
if (!isset($_SESSION['username'])) {
    header('location:../index.php');
} elseif ($_SESSION['data']['level'] != "admin") {
    header('location:../index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Aplikasi pengajuan proposal</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../assets/css/materialize.min.css" media="screen,projection" />

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
    <link rel="shortcut icon" href="../../assets/img/logounitas.png">

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
                        <a href="#user"><img class="circle" src="../../assets/img/logounitas.png"></a>
                        <a href="#name"><span class="blue-text name"><?php echo ucwords($_SESSION['data']['nama_petugas']); ?><span style="color: white;" class="badge green">Admin</span></span></a>
                    </div>
                </li>
                <li><a href="index.php?page=dashboard"><i class="material-icons">dashboard</i>Dashboard</a></li>
                <li><a href="index.php?page=pengumuman"><i class="material-icons">notifications</i>Pengumuman</a></li>
                <li><a href="index.php?page=petugas"><i class="material-icons">account_box</i>Data Reviewer</a></li>
                <li><a href="index.php?page=dosen"><i class="material-icons">featured_play_list</i>Data Dosen</a></li>
                <li><a href="index.php?page=tahun-akademik"><i class="material-icons">assistant</i>Data Tahun Penelitian</a></li>
                <li><a href="index.php?page=data-pengajuan"><i class="material-icons">question_answer</i>Data Pengajuan</a></li>
                <li><a href="index.php?page=data-ulasan"><i class="material-icons">book</i>Data Ulasan</a></li>
                <li><a href="index.php?page=riwayat-proposal"><i class="material-icons">book</i>Riawayat Proposal</a></li>
                <li><a href="index.php?page=laporan-sptb"><i class="material-icons">report</i>Laporan SPTB</a></li>
                <li><a href="index.php?page=laporan-harian"><i class="material-icons">report</i>Laporan Harian</a></li>
                <li><a href="index.php?page=laporan-kemajuan"><i class="material-icons">report</i>Laporan Kemajuan</a></li>
                <li><a href="index.php?page=laporan-akhir"><i class="material-icons">report</i>Laporan Akhir</a></li>
                <li>
                    <div class="divider"></div>
                </li>
                <li><a class="waves-effect" href="../../index.php?p=logout"><i class="material-icons">logout</i>Logout</a></li>
            </ul>
            <a href="#" data-target="slide-out" class="btn sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
        <div class="col s12 m9">
            <?php
            $page =  $_GET['page'] ?? "";
            switch ($page) {
                case 'dashboard':
                    include_once 'dashboard.php';
                    break;
                case 'dosen':
                    include_once 'dosen.php';
                    break;
                case 'tahun-akademik':
                    include_once 'tahunAkademik.php';
                    break;
                case 'data-pengajuan':
                    include_once 'dataPengajuan.php';
                    break;
                case 'data-ulasan':
                    include_once 'dataUlasan.php';
                    break;
                case 'petugas':
                    include_once 'petugas.php';
                    break;
                case 'update-tugas':
                    include_once 'updateTugas.php';
                    break;
                case 'laporan-harian':
                    include_once 'laporanHarian.php';
                    break;
                case 'detail-laporan':
                    include_once 'detailLaporan.php';
                    break;
                case 'laporan-akhir':
                    include_once 'laporanAkhir.php';
                    break;
                case 'detail-laporan-akhir':
                    include_once 'detailLaporanAkhir.php';
                    break;
                case 'detail-laporan-sptb':
                    include_once 'detailLaporanSptb.php';
                    break;
                case 'laporan-kemajuan':
                    include_once 'laporanKemajuan.php';
                    break;
                case 'laporan-sptb':
                    include_once 'laporanSptb.php';
                    break;
                case 'detail-laporan-kemajuan':
                    include_once 'detailLaporanKemajuan.php';
                    break;
                case 'pengumuman':
                    include_once 'pengumuman.php';
                    break;
                case 'riwayat-proposal':
                    include_once 'riwayatProposal.php';
                    break;
                case 'tambah-pengumuman':
                    include_once 'tambahPengumuman.php';
                    break;
                case 'updateStatus':
                    include_once 'updateStatus.php';
                    break;
                case 'update-reviewer':
                    include_once 'updateReviewer.php';
                default:
                    include_once 'dashboard.php';
                    break;
            }


            // } case == "hapus_pengumuman") {
            //     $select = mysqli_query($koneksi, "SELECT * FROM pengumuman WHERE id='" . $_GET['id'] . "'");
            //     $file   = mysqli_fetch_array($select);
            //     $query = mysqli_query($koneksi, "DELETE FROM pengumuman WHERE id='" . $_GET['id'] . "'");
            //     if ($query) {
            //         echo "<script>alert('Success');</script>";
            //         unlink("../files/" . $file['file']);
            //         header('location:index.php?p=pengumuman');
            //     }
            // } case == "th_penelitian_hapus") {
            //     $query = mysqli_query($koneksi, "DELETE FROM th_penelitian WHERE id_th_penelitian='" . $_GET['id_th_penelitian'] . "'");
            //     if ($query) {
            //         header('location:index.php?p=th_penelitian');
            //     }
            // } elseif (@$_GET['p'] == "detail_hapus") {
            //     $select = mysqli_query($koneksi, "SELECT * FROM laporan_harian WHERE id_kegiatan='" . $_GET['id_kegiatan'] . "'");
            //     $file   = mysqli_fetch_assoc($select);
            //     $query = mysqli_query($koneksi, "DELETE FROM laporan_harian WHERE id_kegiatan='" . $_GET['id_kegiatan'] . "'");
            //     if ($query) {
            //         if ($file['foto'] != "noImage.png") {
            //             unlink("../img/" . $file['foto']);
            //         }
            //         header('location:index.php?p=laporan_harian');
            //     }
            // } elseif (@$_GET['p'] == "user_hapus") {
            //     $query = mysqli_query($koneksi, "DELETE FROM petugas WHERE id_petugas='" . $_GET['id_petugas'] . "'");
            //     if ($query) {
            //         header('location:index.php?p=user');
            //     }
            // } elseif (@$_GET['p'] == "regis_hapus") {
            //     $query = mysqli_query($koneksi, "DELETE FROM dosen WHERE id_dosen='" . $_GET['id_dosen'] . "'");
            //     if ($query) {
            //         header('location:index.php?p=registrasi');
            //     }
            // } elseif (@$_GET['p'] == "laporan_akhir_hapus") {
            //     $query = mysqli_query($koneksi, "DELETE FROM laporan_akhir WHERE id_laporan_akhir='" . $_GET['id_laporan_akhir'] . "'");
            //     if ($query) {
            //         header('location:index.php?p=laporan_akhir');
            //     }
            // } elseif (@$_GET['p'] == "hapus_laporan_kemajuan") {
            //     $select = mysqli_query($koneksi, "SELECT * FROM laporan_kemajuan WHERE id='" . $_GET['id'] . "'");
            //     $file   = mysqli_fetch_assoc($select);
            //     $query = mysqli_query($koneksi, "DELETE FROM laporan_kemajuan WHERE id='" . $_GET['id'] . "'");
            //     if ($query) {
            //         unlink("../files/" . $file['nama_file']);
            //         echo "<script>alert('Berhasil')</script>";
            //         echo "<script>location='index.php?p=laporan_kemajuan'</script>";
            //     }
            // } 

            ?>
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