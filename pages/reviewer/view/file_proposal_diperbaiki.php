<?php
include "../../conn/koneksi.php";
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
    $id_proposal_perbaikan   = mysqli_real_escape_string($koneksi, $_GET['id_proposal_perbaikan']);
    $query = mysqli_query($koneksi, "SELECT * FROM proposal_perbaikan WHERE id_proposal_perbaikan='$id_proposal_perbaikan' ");
    $data  = mysqli_fetch_array($query);
    echo mysqli_error($koneksi);
    ?>
    <hr>
    <b>Judul:</b> <?php echo $data['nama_file_proposal']; ?> | <a href='../index.php?p=proposal_diperbaiki'> Kembali </a>
    <hr>
    <embed src="../../files/<?php echo $data['nama_file_proposal']; ?>" type="application/pdf" width="100%" height="580px">
</body>

</html>