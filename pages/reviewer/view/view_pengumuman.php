<?php
include "../../conn/koneksi.php";

?>
<!DOCTYPE html>
<html>

<head>
    <title>Pengumuman</title>
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
    $id_pengumuman  = $_GET["id"];
    $query = mysqli_query($koneksi, "SELECT * FROM pengumuman WHERE id='$id_pengumuman' ");
    $data  = mysqli_fetch_array($query);
    ?>
    <hr>
    <b>Judul:</b> <?php echo $data['file']; ?> | <a href='../index.php?p=pengumuman'> Kembali </a>
    <hr>
    <embed src="../../files/<?php echo $data['file']; ?>" type="application/pdf" width="100%" height="580px">
</body>

</html>