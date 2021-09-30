<table class="responsive-table" border="2" style="width: 100%;">
    <tr>
        <td>
            <h4 class="orange-text hide-on-med-and-down">Tahun Akademik</h4>
        </td>
    </tr>
    <tr>
        <td>
            <form action="" method="POST">
                <label for="th_penelitian">Pilih Tahun</label>
                <select name="th_penelitian" id="th_penelitian">
                    <option value=""></option>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM th_penelitian ORDER BY th_penelitian ASC");
                    while ($data = mysqli_fetch_assoc($tampil)) : ?>
                        <option value="<?= $data['th_penelitian']; ?>"><?= $data['th_penelitian']; ?>/<?= $data['th_penelitian2']; ?> </option>
                    <?php endwhile; ?>
                </select>
        </td>
    </tr>
    <tr>
        <td>
            <button type="submit" class="btn" name="lanjut">Lanjutkan</button>
            </form>
        </td>
    </tr>
</table>
<?php
$thn_penelitian = $_POST['th_penelitian'];
$sql = mysqli_query($koneksi, "SELECT * FROM th_penelitian WHERE th_penelitian='$thn_penelitian' AND status='aktif' ");
$cek = mysqli_num_rows($sql);
$data = mysqli_fetch_assoc($sql);
if (isset($_POST['lanjut'])) {
    if ($data) {
        echo "<script>location='index.php?page=form-penelitian'</script>";
    } else {
        echo "<script>alert('Tidak Ada Penelitian')</script>";
    }
}
?>