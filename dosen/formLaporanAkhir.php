<?php
$id_dosen = $_SESSION['data']['id_dosen'];
$no = 1;
$pengajuan = mysqli_query($koneksi, "SELECT * FROM pengajuan INNER JOIN dosen ON pengajuan.id_dosen=dosen.id_dosen INNER JOIN ulasan ON pengajuan.id_pengajuan=ulasan.id_pengajuan INNER JOIN petugas ON ulasan.id_petugas=petugas.id_petugas WHERE pengajuan.id_dosen='$id_dosen' AND status='diterima'");
$data = mysqli_fetch_assoc($pengajuan);

if (isset($_POST['submit'])) {
    $id_pengajuan = $_POST["id_pengajuan"];
    $tgl = date('Y-m-d');
    $id_pengajuan = $data["id_pengajuan"];
    $nidn = $_POST["nidn"];
    $nama = $_FILES['files']['name'];
    $tmpFilePath = $_FILES['files']['tmp_name'];
    $newFilePath = "./../files/" . date('Y-m-d') . $nidn . "Laporan_akhir" . $_FILES['files']['name'];
    if (move_uploaded_file($tmpFilePath, $newFilePath)) {
        $nama_file = date('Y-m-d') . $nidn . "Laporan_akhir" . $_FILES['files']['name'];
        $query = mysqli_query($koneksi, "INSERT INTO laporan_akhir (id_pengajuan,id_dosen,tgl_upload,nm_file_akhir)  VALUES('$id_pengajuan','$id_dosen','$tgl','$nama_file')");
        if ($query) {
            echo "<script>alert('Berhasil')</script>";
            echo "<script>location='index.php?page=laporan-akhir'</script>";
        } else {
            echo "<script>alert('Gagal')</script>";
            echo "<script>location='index.php?page=laporan-akhir'</script>";
        }
    } else {
        echo "<script>alert('Gagal')</script>";
    }
}
?>
<div class="row">
    <div class="col">
        <h3 class="orange-text">Laporan </h3>
    </div>
    <form action="" method="POST" class="col s12" enctype="multipart/form-data">
        <input type="hidden" value="<?= $data["id_pengajuan"]; ?>" name="id_pengajuan">
        <input type="hidden" value="<?= $data["id_dosen"]; ?>" name="id_dosen">
        <div class="row">
            <div class="input-field col s12">
                <input disabled value="<?= ucwords($_SESSION['data']['nama']); ?>" id="nama" type="text" class="validate">
                <label for="nama">Nama Lengkap</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input value="<?= $_SESSION['data']['nidn']; ?>" id="nidn" name="nidn" type="text" class="validate" disabled>
                <label for="nidn">NIDN</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input value="<?= $data['judul_penelitian']; ?>" id="judul_penelitian" name="judul_penelitian" type="text" class="validate" disabled>
                <label for="nidn">Judul Penelitian</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input value="" id="tgl_kegiatan" name="tgl_kegiatan" type="date" class="validate">
                <label for="tgl_kegiatan">Tanggal</label>
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