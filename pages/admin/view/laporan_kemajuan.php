<?php
include "../../conn/koneksi.php";
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
    $id_laporan_kemajuan  = $_GET["id_laporan_kemajuan"];
    $query = mysqli_query($koneksi, "SELECT * FROM laporan_kemajuan WHERE id='$id_laporan_kemajuan' ");
    $data  = mysqli_fetch_array($query);
    echo mysqli_error($koneksi);
    ?>
    <hr>
    <b>Judul:</b> <?php echo $data['nama_file']; ?> | <a href='../index.php?p=laporan_kemajuan'> Kembali </a>
    <hr>
    <embed src="../../files/<?php echo $data['nama_file']; ?>" type="application/pdf" width="100%" height="580px">
</body>

</html>