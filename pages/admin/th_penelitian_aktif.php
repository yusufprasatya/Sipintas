<?php
include '../conn/koneksi.php';

$id_th_penelitian   = mysqli_real_escape_string($koneksi, $_GET['id_th_penelitian']);
$query = mysqli_query($koneksi, "SELECT * FROM th_penelitian WHERE id_th_penelitian='$id_th_penelitian' ");
$data  = mysqli_fetch_array($query);

if ($data['status'] == "aktif") {
    echo "<script>alert('Tahun Akademik Sudah Aktif')</script>";
    echo "<script>location='index.php?p=th_penelitian'</script>";
} else {
    $aktifkan = mysqli_query($koneksi, "UPDATE th_penelitian SET status='aktif'WHERE id_th_penelitian='$id_th_penelitian'");
    if ($aktifkan) {
        echo "<script>alert('Tahun Akademik Berhasil Diaktifkan')</script>";
        echo "<script>location='index.php?p=th_penelitian'</script>";
    }
}
