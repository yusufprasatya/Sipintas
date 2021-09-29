<?php
session_start();
include '../conn/koneksi.php';

$id_pengajuan = $_GET['id_pengajuan'];
$select = mysqli_query($koneksi, "SELECT * FROM pengajuan WHERE id_pengajuan='$id_pengajuan'");
$file   = mysqli_fetch_assoc($select);
$query = mysqli_query($koneksi, "DELETE FROM pengajuan WHERE id_pengajuan='$id_pengajuan'");
if ($query) {
    unlink("../files/" . $file['file_b3']);
    unlink("../files/" . $file['file_b5']);
    unlink("../files/" . $file['file_b6a']);
    unlink("../files/" . $file['file_b7']);
    unlink("../files/" . $file['file_b8']);
    unlink("../files/" . $file['file_b9']);
    unlink("../files/" . $file['file_b10']);
    echo "<script>alert('Berhasil')</script>";
    echo "<script>location='index.php?p=data_pengajuan'</script>";
}
