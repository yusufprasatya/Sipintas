<?php
session_start();
include_once '../conn/koneksi.php';
include_once '../conn/functions.php';
$id_petugas = $_SESSION['data']['id_petugas'];
if (isset($_POST['tanggapi'])) {
    $id_pengajuan = $_POST['id_pengajuan'];
    $skor1 = $_POST['skor1'];
    $skor2 = $_POST['skor2'];
    $skor3 = $_POST['skor3'];
    $skor4 = $_POST['skor4'];
    $skor4 = $_POST['skor4'];
    $skor5 = $_POST['skor5'];
    $ulasan = $_POST['ulasan'];
    $alasan = $_POST['alasan_penolakan'];
    $biaya_disetujui = $_POST['biaya_disetujui'];
    $nilai1 = $skor1 * 30;
    $nilai2 = $skor2 * 20;
    $nilai3 = $skor3 * 15;
    $nilai4 = $skor4 * 25;
    $nilai5 = $skor5 * 10;
    $total_skor = $skor1 + $skor2 + $skor3 + $skor4 + $skor5;
    $total_nilai = $nilai1 + $nilai2 + $nilai3 + $nilai4 + $nilai5;
    $tgl = date('Y-m-d');

    if ($total_nilai >= 350 && $alasan != "i") {
        $query = mysqli_query($koneksi, "INSERT INTO ulasan VALUES (NULL,'$id_pengajuan','$tgl','$skor1','$skor2','$skor3','$skor4','$skor5','$nilai1','$nilai2','$nilai3','$nilai4','$nilai5','$ulasan','$id_petugas','$total_skor','$total_nilai',$biaya_disetujui,'$alasan','diterima')");
        if ($query) {
            echo "<script>alert('Propsal Ini Diterima')</script>";
            echo "<script>location='index.php?p=ulasan';</script>";
        }
    } else {
        $update2 = mysqli_query($koneksi, "INSERT INTO ulasan VALUES (NULL,'$id_pengajuan','$tgl','$skor1','$skor2','$skor3','$skor4','$skor5','$nilai1','$nilai2','$nilai3','$nilai4','$nilai5','$ulasan','$id_petugas','$total_skor','$total_nilai',$biaya_disetujui,'$alasan','ditolak')");
        if ($update2) {
            echo "<script>alert('Proposal ini Ditolak')</script>";
            echo "<script>location='index.php?p=pengajuan';</script>";
        }
    }
}
