<?php
$id_dosen = $_SESSION['data']['id_dosen'];
$no = 1;
$pengajuan = mysqli_query($koneksi, "SELECT * FROM pengajuan INNER JOIN dosen ON pengajuan.id_dosen=dosen.id_dosen INNER JOIN ulasan ON pengajuan.id_pengajuan=ulasan.id_pengajuan INNER JOIN petugas ON ulasan.id_petugas=petugas.id_petugas WHERE pengajuan.id_dosen='$id_dosen' AND status='diterima'");
$data = mysqli_fetch_assoc($pengajuan);
// Compress image
function compressImage($source, $destination, $quality)
{
    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);

    imagejpeg($image, $destination, $quality);
}


if (isset($_POST['submit'])) {
    $id_pengajuan = $_POST["id_pengajuan"];
    $judul_penelitian = $_POST['judul_penelitian'];
    $nidn = $_POST['nidn'];
    $tgl = date('Y-m-d');
    $foto = $_FILES['foto']['name'];
    $source = $_FILES['foto']['tmp_name'];
    $folder = './../img/';
    $listeks = array('jpg', 'png', 'jpeg');
    $pecah = explode('.', $foto);
    $eks = $pecah['1'];
    $size = $_FILES['foto']['size'];
    $nama = date('dmYis') . $foto;
    $tgl_kegiatan = $_POST["tgl_kegiatan"];
    $judul_penelitian = $_POST["judul_penelitian"];
    $kegiatan     = $_POST["kegiatan"];

    if ($foto != "") {
        if (in_array($eks, $listeks)) {
            if ($size <= 10000000) {
                compressImage($_FILES['foto']['tmp_name'], $folder . $nama, 30);
                //  move_uploaded_file($source, $folder . $nama);
                $query = mysqli_query($koneksi, "INSERT INTO laporan_harian(id_pengajuan,tgl_kegiatan,kegiatan,id_dosen,foto) VALUES('$id_pengajuan','$tgl_kegiatan','$kegiatan','$id_dosen','$nama')");
                if ($query) {
                    echo "<script>alert('Berhasil')</script>";
                    echo "<script>location='index.php?page=laporan-harian&id_pengajuan=$id_pengajuan';</script>";
                }
            } else {
                echo "<script>alert('Ukuran Gambar Tidak Lebih Dari 10MB')</script>";
            }
        } else {
            echo "<script>alert('Format File Tidak Di Dukung')</script>";
        }
    } else {
        $query = mysqli_query($koneksi, "INSERT INTO laporan_harian(id_pengajuan,tgl_kegiatan,kegiatan,id_dosen,foto) VALUES('$id_pengajuan','$tgl_kegiatan','$kegiatan','$id_dosen','noImage.png')");
        if ($query) {
            echo "<script>alert('Berhasil')</script>";
            echo "<script>location='index.php?page=laporan-harian&id_pengajuan=$id_pengajuan';</script>";
        }
    }
}
?>
<div class="row">
    <div class="col">
        <h3 class="orange-text">Laporan Kegiatan Harian</h3>
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
                <input disabled value="<?= $_SESSION['data']['nidn']; ?>" id="nidn" name="nidn" type="text" class="validate">
                <label for="nidn">NIDN</label>
            </div>
        </div>
        <h5 class="orange-text">Judul Penelitian</h5>
        <div class="row">
            <div class="input-field col s12">
                <textarea disabled id="textarea1" name="judul_penelitian" class="materialize-textarea"><?= $data["judul_penelitian"]; ?></textarea>
                <label for="textarea1">
                    Masukan Judul
                </label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input value="" id="tgl_kegiatan" name="tgl_kegiatan" type="date" class="validate">
                <label for="tgl_kegiatan">Tanggal</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea name="kegiatan" id="kegiatan" cols="30" class="materialize-textarea" rows="10"></textarea>
                <label for="kegiatan">Tuliskan Kegiatan</label>
            </div>
        </div>
        <label for="">Tambahkan Foto/ File Gambar Berupa('jpg', 'png', 'jpeg')</label>
        <div class="file-field input-field">
            <div class="btn">
                <span>File</span>
                <input name="foto" type="file">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <button name="submit" class="btn right" type="submit">Kirim</button>
    </form>
</div>