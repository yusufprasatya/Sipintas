<?php
include 'conn/koneksi.php';

$id_dosen = $_SESSION['data']['id_dosen'];
$id_pengajuan = $_GET['id_pengajuan'];
$no = 1;
$pengajuan = mysqli_query($koneksi, "SELECT * FROM pengajuan INNER JOIN dosen ON pengajuan.id_dosen=dosen.id_dosen INNER JOIN ulasan ON pengajuan.id_pengajuan=ulasan.id_pengajuan INNER JOIN petugas ON ulasan.id_petugas=petugas.id_petugas WHERE pengajuan.id_dosen='$id_dosen' AND status='diterima'");
$data = mysqli_fetch_assoc($pengajuan);

if (isset($_POST['submit'])) {
    $id_pengajuan = $_POST["id_pengajuan"];
    $nidn = $data['nidn'];
    $tgl = $_POST['tanggal'];
    $id_pengajuan = $data["id_pengajuan"];
    $nama = $_FILES['files']['name'];
    $tmpFilePath = $_FILES['files']['tmp_name'];
    $newFilePath = "./../files/" . date('Y-m-d') . $nidn . "Laporan_kemajuan" . $nama;
    if (move_uploaded_file($tmpFilePath, $newFilePath)) {
        $nama_file = date('Y-m-d') . $nidn . "Laporan_kemajuan" . $nama;
        $query = mysqli_query($koneksi, "INSERT INTO laporan_kemajuan(id_dosen,id_pengajuan,tgl_diajukan,nama_file)  VALUES('$id_dosen','$id_pengajuan','$tgl','$nama_file')");
        if ($query) {
            echo "<script>alert('Berhasil')</script>";
            echo "<script>location='index.php?p=laporan_kemajuan'</script>";
        } else {
            echo "<script>alert('Gagal')</script>";
            echo "<script>location='index.php?p=laporan_kemajuan'</script>";
        }
    } else {
        echo "<script>alert('Gagal cuy')</script>";
    }
}
?>
<div class="row">
    <div class="col">
        <h3 class="orange-text">Laporan Kemajuan </h3>
    </div>
    <form action="" method="POST" class="col s12" enctype="multipart/form-data">
        <input type="hidden" value="<?= $data["id_pengajuan"]; ?>" name="id_pengajuan">

        <div class="row">
            <div class="input-field col s12">
                <input disabled value="<?php echo ucwords($_SESSION['data']['nama']); ?>" id="nama" type="text" class="validate">
                <label for="nama">Nama Lengkap</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input disabled value="<?php echo $_SESSION['data']['nidn']; ?>" id="nidn" name="nidn" type="text" class="validate">
                <label for="nidn">NIDN</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input value="" id="tanggal" name="tanggal" type="date" class="validate">
                <label for="tanggal">Tanggal</label>
            </div>
        </div>
        <div class="file-field input-field">
            <div class="btn">
                <span>File</span>
                <input name="files" type="file">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <button name="submit" class="btn right" type="submit">Kirim</button>
    </form>
</div>