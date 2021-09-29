<?php
include 'conn/koneksi.php';

if (isset($_POST['upload'])) {
    $id_dosen        = $_SESSION['data']['id_dosen'];
    $nidn        = $_SESSION['data']['nidn'];
    $nm_pengusul = $_SESSION['data']['nama'];
    $fakultas    = $_POST['fakultas'];
    $judul_penelitian = $_POST['judul_penelitian'];
    $bidang_ilmu  = $_POST['bidang_ilmu'];
    $jmlh_anggota         = $_POST['jmlh_anggota'];
    $biaya_diusulkan       = $_POST['biaya_diusulkan'];
    $tgl         = date('Y-m-d');

    for ($i = 0; $i < count($_FILES['files']['name']); $i++) {

        //Get the temp file path
        $tmpFilePath = $_FILES['files']['tmp_name'][$i];

        //Make sure we have a filepath
        if ($tmpFilePath != "") {

            //Setup our new file path
            $b0 = "lampiran" . $nidn;
            $newFilePath = "./../files/" . date('Y-m-d') . $nidn . $_FILES['files']['name'][$i];
        }
        //Upload the file into the temp dir
        if (move_uploaded_file($tmpFilePath, $newFilePath)) {
        }
    }
    $file_b3    =  date('Y-m-d') . $nidn . $_FILES['files']['name'][0];
    $file_b5    =  date('Y-m-d') . $nidn . $_FILES['files']['name'][1];
    $file_b6a   =  date('Y-m-d') . $nidn . $_FILES['files']['name'][2];
    $file_b7    =  date('Y-m-d') . $nidn . $_FILES['files']['name'][3];
    $file_b8    =  date('Y-m-d') . $nidn . $_FILES['files']['name'][4];
    $file_b9    =  date('Y-m-d') . $nidn . $_FILES['files']['name'][5];
    $file_b10   =  date('Y-m-d') . $nidn . $_FILES['files']['name'][6];
    $query = mysqli_query($koneksi, "INSERT INTO pengajuan (id_dosen,nm_pengusul,nidn,judul_penelitian,bidang_ilmu,jmlh_anggota,biaya_diusulkan,file_b3,file_b5,file_b6a,file_b7,file_b8,file_b9,file_b10,tgl_pengajuan)  VALUES('$id_dosen','$nm_pengusul','$nidn','$judul_penelitian','$bidang_ilmu','$jmlh_anggota','$biaya_diusulkan','$file_b3','$file_b5','$file_b6a','$file_b7','$file_b8','$file_b9','$file_b10','$tgl')");

    if ($query) {
        echo "<script>alert('Segera di Proses')</script>";
    } else {
        echo mysqli_error($koneksi);
    }
}
?>
<div class="row">
    <div class="col">
        <h3 class="orange-text">From Pengajuan Proposal</h3>
    </div>
    <form action="" method="POST" class="col s12" enctype="multipart/form-data">
        <div class="row">
            <div class="input-field col s12">
                <input disabled value="<?php echo ucwords($_SESSION['data']['nama']); ?>" id="nama" type="text" class="validate" required>
                <label for="nama">Nama Lengkap Pengusul</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input disabled value="<?php echo $_SESSION['data']['nidn']; ?>" id="nidn" type="text" class="validate" required>
                <label for="nidn">NIDN</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="bidang_ilmu" type="text" name="bidang_ilmu" class="validate" required>
                <label for="bidang_ilmu">Bidang Ilmu</label>
            </div>
            <div class="input-field col s3">
                <input id="jmlh_anggota" type="text" name="jmlh_anggota" class="validate" required>
                <label for="jmlh_anggota">Jumlah Anggota</label>
            </div>
            <div class="input-field col s3">
                <label for="jmlh_anggota">Orang</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="biaya_diusulkan" type="number" name="biaya_diusulkan" class="validate" required>
                <label for="biaya_diusulkan"> Biaya Yang Diusulkan</label>
                <sub>Tuliskan dalam bentuk angka tanpa (titk) dan (koma). Contoh 3500000</sub>
            </div>
        </div>
        <h5 class="orange-text">Judul Penelitian</h5>
        <div class="row">
            <div class="input-field col s12">
                <textarea id="textarea1" name="judul_penelitian" class="materialize-textarea" required></textarea>
                <label for="textarea1">
                    Masukan Judul
                </label>
            </div>
        </div>
        <h5 class="orange-text">Upload Berkas(Harus berupa file .PDF)</h5>
        <label for="">Halaman Pengesahan ( Lampiran B.3) </label>
        <div class="file-field input-field">
            <div class="btn">
                <span>File</span>
                <input name="files[]" type="file" multiple required>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" required>
            </div>
        </div>
        <label for="">Identifikasi & Uraian Umum Penelitian (Lampiran B.5) </label>
        <div class="file-field input-field">
            <div class="btn">
                <span>File</span>
                <input name="files[]" type="file" multiple required>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <label for="">Proposal Penelitian (Lampiran B.6a) </label>
        <div class="file-field input-field">
            <div class="btn">
                <span>File</span>
                <input name="files[]" type="file" multiple required>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <label for="">Justifkasi Rencana Anggaran Biaya Penelitian ( Lampiran B.7) </label>
        <div class="file-field input-field">
            <div class="btn">
                <span>File</span>
                <input name="files[]" type="file" multiple required>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <label for="">Personalia Peneliti (Lampiran B.8)</label>
        <div class="file-field input-field">
            <div class="btn">
                <span>File</span>
                <input name="files[]" type="file" multiple>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <label for="">Biodata Ketua dan Anggota Peneliti (Lampiran B.9) </label>
        <div class="file-field input-field">
            <div class="btn">
                <span>File</span>
                <input name="files[]" type="file" multiple>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <label for="">Surat Pernyataan Orisinalitas (Lampiran B.10)</label>
        <div class="file-field input-field">
            <div class="btn">
                <span>File</span>
                <input name="files[]" type="file" multiple>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>

        <button name="upload" class="btn right" type="submit">Kirim</button>
    </form>
</div>