<?php
include '../../config/koneksi.php';

$id_th_penelitian   = mysqli_real_escape_string($koneksi, $_GET['id_th_penelitian']);
$query = mysqli_query($koneksi, "SELECT * FROM th_penelitian WHERE id_th_penelitian='$id_th_penelitian' ");
$data  = mysqli_fetch_array($query);

if ($data['status'] == "nonaktif") {
    echo "<script>alert('Tahun akademik sudah tidak aktif')</script>";
    echo "<script>location='index.php?page=tahunAkademik'</script>";
} else {
    $aktifkan = mysqli_query($koneksi, "UPDATE th_penelitian SET status='nonaktif' WHERE id_th_penelitian='$id_th_penelitian'");
    if ($aktifkan) {
        echo "<script>alert('Tahun Akademik Berhasil Dinonaktifkan')</script>";
        echo "<script>location='index.php?page=tahunAkademik'</script>";
    }
}
