<?php
include_once '../../../config/koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>B3</title>
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
    $nidn   = mysqli_real_escape_string($koneksi, $_GET['nidn']);
    $query = mysqli_query($koneksi, "SELECT * FROM pengajuan WHERE nidn='$nidn' ");
    $data  = mysqli_fetch_array($query);
    echo mysqli_error($koneksi);
    ?>
    <hr>
    <b>Judul:</b> <?php echo $data['file_b3']; ?> | <a href='../index.php?p=pengajuan'> Kembali </a>
    <hr>
    <embed src="../../files/<?php echo $data['file_b3']; ?>" type="application/pdf" width="100%" height="580px">
</body>

</html>