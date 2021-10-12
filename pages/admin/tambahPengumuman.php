<?php
//Mengupload file pengumuman setelah dilakukan validasi
if (isset($_POST['submit'])) {
    $keterangan = $_POST['keterangan'];
    $tanggal    = $_POST['tanggal'];
    $nama = $_FILES['files']['name'];
    $tmpFilePath = $_FILES['files']['tmp_name'];
    $nama_file = date('Y-m-d') . "Pengumuman" . rand();
    $newFilePath = "./../files/" . $nama_file;
    if (move_uploaded_file($tmpFilePath, $newFilePath)) {

        $query = mysqli_query($koneksi, "INSERT INTO pengumuman(keterangan, tanggal, file)  VALUES('$keterangan','$tanggal','$nama_file')");
        if ($query) {
            echo "<script>alert('Berhasil')</script>";
            echo "<script>location='index.php?p=pengumuman'</script>";
        } else {
            echo "<script>alert('Gagal')</script>";
            echo "<script>location='index.php?p=pengumuman'</script>";
        }
    } else {
        echo "<script>alert('Gagal')</script>";
    }
}
?>
<div class="row">
    <div class="col">
        <h3 class="orange-text">Pengumuman </h3>
    </div>
    <form action="" method="POST" class="col s12" enctype="multipart/form-data">
        <div class="row">
            <div class="input-field col s12">
                <input id="keterangan" name="keterangan" type="text" class="validate" required>
                <label for="keterangan">Keterangan</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input value="" id="tanggal" name="tanggal" type="date" class="validate" required>
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
        <button name="submit" class="btn right" type="submit">Submit</button>
    </form>
</div>