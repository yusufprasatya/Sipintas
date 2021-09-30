<?php
if (isset($_POST['lanjut'])) {
    $judul_penelitian = $_POST['judul_penelitian'];
    $id_pengajuan = $_POST['id_pengajuan'];
    $cek = mysqli_num_rows($sql);
    if (!empty($judul_penelitian)) {
        echo "<script>location='index.php?p=proposal-perbaikan&id_pengajuan=$id_pengajuan'</script>";
    }
}
?>
<table class="responsive-table" border="2" style="width: 100%;">
    <tr>
        <td>
            <h4 class="orange-text hide-on-med-and-down">Pilih Penelitian Aktif</h4>
        </td>
    <tr>
        <td>
            <form action="" method="POST">
                <label for="judul_penelitian">Pilih</label>
                <select name="judul_penelitian" id="judul_penelitian">
                    <option value=""></option>
                    <?php
                    $id_dosen = $_SESSION['data']['id_dosen'];
                    $tampil = mysqli_query($koneksi, "SELECT * FROM pengajuan WHERE status ='diterima' AND id_dosen = '$id_dosen' ");
                    while ($data = mysqli_fetch_assoc($tampil)) : ?>
                        <option value="<?= $data['id_pengajuan']; ?>"><?= $data['judul_penelitian'] . " " . " (" . ($data['tgl_pengajuan']) . ") "; ?></option>
                </select>
                <input type="hidden" name="id_pengajuan" value="<?= $data['id_pengajuan']; ?>">
            <?php endwhile; ?>
        </td>
    </tr>
    </tr>
    <tr>
        <td>
            <button type="submit" class="btn" name="lanjut">Lanjutkan</button>
            </form>
        </td>
    </tr>
</table>