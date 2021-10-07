<?php
include "../../config/koneksi.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Laporan Akhir</title>
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
    $id_laporan_akhir   = $_GET["id_laporan_akhir"];
    $query = mysqli_query($koneksi, "SELECT * FROM laporan_akhir WHERE id_laporan_akhir='$id_laporan_akhir' ");
    $data  = mysqli_fetch_array($query);
    echo mysqli_error($koneksi);
    ?>
    <hr>
    <b>Judul:</b> <?php echo $data['nm_file_akhir']; ?> | <a href='../index.php?p=laporan_akhir'> Kembali </a>
    <hr>
    <embed src="../../files/<?php echo $data['nm_file_akhir']; ?>" type="application/pdf" width="100%" height="580px">
</body>

</html>