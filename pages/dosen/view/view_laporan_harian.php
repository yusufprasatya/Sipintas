<?php
include "../../config/koneksi.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Laporan Kegiatan</title>

</head>

<body>
    <?php
    $id_kegiatan   = $_GET["id_kegiatan"];
    $query = mysqli_query($koneksi, "SELECT * FROM laporan_harian WHERE id_kegiatan='$id_kegiatan' ");
    $data  = mysqli_fetch_array($query);
    echo mysqli_error($koneksi);

    ?>

    <embed src="./../../img/<?= $data['foto']; ?>" width="100%" type="">
</body>

</html>