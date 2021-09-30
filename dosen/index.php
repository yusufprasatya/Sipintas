<?php
session_start();
error_reporting(0);
include '../conn/koneksi.php';
if (!isset($_SESSION['username'])) {
  header('location:../index.php');
} elseif ($_SESSION['level'] != "dosen") {
  header('location:../index.php');
}
$select = mysqli_query($koneksi, "SELECT * FROM pengumuman");
$count = mysqli_num_rows($select);


?>
<!DOCTYPE html>
<html>

<head>
  <title>Aplikasi Pengajuan proposal penelitian</title>
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
            <a href="#name"><span class="blue-text name"><?php echo ucwords($_SESSION['data']['nama']); ?><span style="color: white;" class="badge green">Dosen</span></span></a>
          </div>
        </li>
        <li><a href="index.php?p=dashboard"><i class="material-icons">dashboard</i>Dashboard</a></li>
        <li><a href="index.php?p=penelitian"><i class="material-icons">send</i>Proposal</a></li>
        <li><a href="index.php?p=ulasan"><i class="material-icons">star</i>Proposal Diterima</a></li>
        <li><a href="index.php?p=proposal-ditolak"><i class="material-icons">launch</i>Proposal Ditolak</a></li>
        <li><a href="index.php?p=validasi-porposal-perbaikan"><i class="material-icons">launch</i>Proposal Perbaikan</a></li>
        <li><a href="index.php?p=validasi-sptb"><i class="material-icons">report</i>SPTB</a></li>
        <li><a href="index.php?p=validasi-laporan-harian"><i class="material-icons">report</i>Laporan Harian</a></li>
        <li><a href="index.php?p=validasi-laporan-kemajuan"><i class="material-icons">report</i>Laporan Kemajuan</a></li>
        <li><a href="index.php?p=validasi-laporan-akhir"><i class="material-icons">report</i>Laporan Akhir</a></li>
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
      } elseif (@$_GET['p'] == "penelitian") {
        include_once 'penelitian.php';
      } elseif (@$_GET['p'] == "form_penelitian") {
        include_once 'form_penelitian.php';
      } elseif (@$_GET['p'] == "ulasan") {
        include_once 'ulasan.php';
      } elseif (@$_GET['p'] == "proposal-ditolak") {
        include_once 'proposalDitolak.php';
      } elseif (@$_GET['p'] == "laporan_harian") {
        include_once 'laporan_harian.php';
      } elseif (@$_GET['p'] == "proposal_perbaikan") {
        include_once 'proposal_perbaikan.php';
      } elseif (@$_GET['p'] == "validasi-sptb") {
        include_once 'validasiSptb.php';
      } elseif (@$_GET['p'] == "validasi-laporan-harian") {
        include_once 'validasiLaporanHarian.php';
      } elseif (@$_GET['p'] == "validasi-laporan-kemajuan") {
        include_once 'validasiLaporanKemajuan.php';
      } elseif (@$_GET['p'] == "validasi-laporan-akhir") {
        include_once 'validasiLaporanAkhir.php';
      } elseif (@$_GET['p'] == "validasi-porposal-perbaikan") {
        include_once 'validasiPerbaikan.php';
      } elseif (@$_GET['p'] == "proposal_perbaikan") {
        include_once 'proposal_perbaikan.php';
      } elseif (@$_GET['p'] == "form_proposal_perbaikan") {
        include_once 'form_proposal_perbaikan.php';
      } elseif (@$_GET['p'] == "laporan-kemajuan") {
        include_once 'laporanKemajuan.php';
      } elseif (@$_GET['p'] == "form-laporan-kemajuan") {
        include_once 'formKemajuan.php';
      } elseif (@$_GET['p'] == "form_laporan_harian") {
        include_once 'form_laporan_harian.php';
      } elseif (@$_GET['p'] == "form_laporan_akhir") {
        include_once 'form_laporan_akhir.php';
      } elseif (@$_GET['p'] == "laporan_akhir") {
        include_once 'laporan_akhir.php';
      } elseif (@$_GET['p'] == "sptb") {
        include_once 'sptb.php';
      } elseif (@$_GET['p'] == "pengumuman") {
        include_once 'pengumuman.php';
      } elseif (@$_GET['p'] == "pengajuan_hapus") {
        $query = mysqli_query($koneksi, "SELECT * FROM pengajuan WHERE id_pengajuan='" . $_GET['id_pengajuan'] . "'");
        $data = mysqli_fetch_assoc($query);
        // unlink('../img/' . $data['foto']);
        if ($data['status'] == "ditolak") {
          $delete = mysqli_query($koneksi, "DELETE FROM pengajuan WHERE id_pengajuan='" . $_GET['id_pengajuan'] . "'");
          header('location:index.php?p=ulasan');
        } elseif ($data['status'] == "diterima") {
          $delete = mysqli_query($koneksi, "DELETE FROM pengajuan WHERE id_pengajuan='" . $_GET['id_pengajuan'] . "'");
          if ($delete) {
            $delete2 = mysqli_query($koneksi, "DELETE FROM ulasan WHERE id_pengajuan='" . $_GET['id_pengajuan'] . "'");
            header('location:index.php?p=ulasan');
          }
        }
      } elseif (@$_GET['p'] == "kegiatan_hapus") {
        $id_kegiatan = $_GET['id_kegiatan'];
        $select = mysqli_query($koneksi, "SELECT * FROM laporan_harian WHERE id_kegiatan='" . $_GET['id_kegiatan'] . "'");
        $file   = mysqli_fetch_assoc($select);
        $query = mysqli_query($koneksi, "DELETE FROM laporan_harian WHERE id_kegiatan='" . $_GET['id_kegiatan'] . "'");
        if ($query) {
          if ($file['foto'] != "noImage.png") {
            unlink("../img/" . $file['foto']);
          }
          echo "<script>alert('Berhasil')</script>";
          echo "<script>location='index.php?p=laporan_harian&id_pengajuan=$id_kegiatan'</script>";
        }
      } elseif (@$_GET['p'] == "hapus_laporan_kemajuan") {
        $select = mysqli_query($koneksi, "SELECT * FROM laporan_kemajuan WHERE id='" . $_GET['id'] . "'");
        $file   = mysqli_fetch_assoc($select);
        $query = mysqli_query($koneksi, "DELETE FROM laporan_kemajuan WHERE id='" . $_GET['id'] . "'");
        if ($query) {
          unlink("../files/" . $file['nama_file']);
          echo "<script>alert('Berhasil')</script>";
          echo "<script>location='index.php?p=laporan_kemajuan'</script>";
        }
      }
      ?>
    </div>
  </div>
  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="../js/materialize.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="sweetalert2.all.min.js"></script>
  <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
  <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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