<?php
include_once '../conn/koneksi.php';
$status = $_POST['status'] ?? "";
$id_pengajuan = $_GET['id_pengajuan'] ?? "";
$query = mysqli_query($koneksi, "UPDATE pengajuan SET status = 'selesai' WHERE id_pengajuan ='$id_pengajuan'");
if ($query) {
    echo "<script>alert('Berhasil');</script>";
    echo "<script>location='index.php?p=data_pengajuan'</script>";
}
