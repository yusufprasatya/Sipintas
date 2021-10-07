<?php
include "../../config/koneksi.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Laporan Kemajuan</title>
    <style type="text/css">
        body {
            font-family: verdana;
            font-size: 12px;
        }

        a {
            text-decoration: none;
            color: #3050F3;
        }

        a:hover {
            color: #000F5E;
        }
    </style>
</head>

<body>
    <?php
    $id_laporan_sptb  = $_GET["id_laporan_sptb"];
    $query = mysqli_query($koneksi, "SELECT * FROM laporan_sptb WHERE id='$id_laporan_sptb' ");
    $data  = mysqli_fetch_array($query);
    ?>
    <hr>
    <b>Judul:</b> <?= $data['nama_file']; ?> | <a href='../index.php?p=laporan-sptb'> Kembali </a>
    <hr>
    <embed src="../../files/<?= $data['nama_file']; ?>" type="application/pdf" width="100%" height="580px">
</body>

</html>