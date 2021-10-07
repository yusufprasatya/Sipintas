<?php
$nidn = $_SESSION['data']['nidn'];
$no = 1;
$pengajuan = mysqli_query($koneksi, "SELECT * FROM pengajuan INNER JOIN dosen ON pengajuan.nidn=dosen.nidn INNER JOIN ulasan ON pengajuan.id_pengajuan=ulasan.id_pengajuan INNER JOIN petugas ON ulasan.id_petugas=petugas.id_petugas WHERE pengajuan.nidn='$nidn' AND status='diterima'");
$data = mysqli_fetch_assoc($pengajuan);

if (isset($_POST['upload'])) {
    $tgl = date('Y-m-d');
    $id_pengajuan = $data["id_pengajuan"];
    $nama = $_FILES['files']['name'];
    $tmpFilePath = $_FILES['files']['tmp_name'];
    $newFilePath = "./../files/" . date('Y-m-d') . $nidn . "proposal_perbaikan" . $_FILES['files']['name'];
    if (move_uploaded_file($tmpFilePath, $newFilePath)) {
        $nama_file = date('Y-m-d') . $nidn . "proposal_perbaikan" . $_FILES['files']['name'];
        $query = mysqli_query($koneksi, "INSERT INTO proposal_perbaikan (id_pengajuan,nama_file_proposal,tgl_perbaikan)  VALUES('$id_pengajuan','$nama_file','$tgl')");
        if ($query) {
            echo "<script>alert('Berhasil')</script>";
            echo "<script>location='index.php?page=proposal-diterima'</script>";
        } else {
            echo "<script>alert('Gagal')</script>";
            echo "<script>location='index.php?page=proposal-diterima'</script>";
        }
    }
}
?>
<div class="row">
    <div class="col">
        <h3 class="orange-text">Proposal Perbaikan</h3>
    </div>
    <form action="" method="POST" class="col s12" enctype="multipart/form-data">
        <div class="row">
            <div class="input-field col s12">
                <input disabled value="<?php echo ucwords($_SESSION['data']['nama']); ?>" id="nama" type="text" class="validate">
                <label for="nama">Nama Lengkap Pengusul</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input disabled value="<?php echo $_SESSION['data']['nidn']; ?>" id="nidn" type="text" class="validate">
                <label for="nidn">NIDN</label>
            </div>
        </div>
        <label for="">Proposal Penelitian (Lampiran B.6a) </label>
        <div class="file-field input-field">
            <div class="btn">
                <span>File</span>
                <input name="files" type="file">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <button name="upload" class="btn right" type="submit">Kirim</button>
    </form>
</div>