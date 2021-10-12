<?php
$id_pengajuan = $_GET['id_pengajuan'] ?? "";
$id_petugas = $_SESSION['data']['id_petugas'];

if (isset($_POST['submit'])) {
    $penugasan1 = $_POST['reviewer1'];
    $penugasan2 = $_POST['reviewer2'];
    $update = mysqli_query($koneksi, "UPDATE pengajuan SET penugasan1 = '$penugasan1', penugasan2 = '$penugasan2' WHERE id_pengajuan = '$id_pengajuan'");
    if ($update) {
        echo "<script>alert('Success');</script>";
        echo "<script>location='index.php?page=data-ulasan';</script>";
    }
}
?>
<div class="row">
    <div class="col s12 m9">
        <h3 class="orange-text">Update Penugasan Reviewer</h3>
    </div>
</div>

<div class="row">
    <div class="col s12 m9">
        <form action="" method="POST">
            <?php
            $query1 = mysqli_query($koneksi, "SELECT * FROM pengajuan INNER JOIN petugas ON petugas.id_petugas = pengajuan.penugasan1 WHERE id_Pengajuan = $id_pengajuan");
            $query2 = mysqli_query($koneksi, "SELECT * FROM pengajuan INNER JOIN petugas ON petugas.id_petugas = pengajuan.penugasan2 WHERE id_Pengajuan = $id_pengajuan");
            $petugasQuery = mysqli_query($koneksi, "SELECT * FROM petugas");
            $petugasQuery2 = mysqli_query($koneksi, "SELECT * FROM petugas ORDER BY id_petugas ASC")
            ?>
            <!-- Select for reviewer 1 -->
            <p>Reviewer 1</p>
            <select id="reviewer1" name="reviewer1" required>
                <?php $data1 =  mysqli_fetch_assoc($query1);
                $id_petugas1 = $data1['id_petugas'];
                $cekUlasan = mysqli_query($koneksi, "SELECT * FROM ulasan WHERE id_pengajuan = $id_pengajuan AND id_petugas = $id_petugas1");
                if (mysqli_num_rows($cekUlasan)) : ?>
                    <option value="<?= $data1['id_petugas'] ?>">Tidak bisa mengupdate reviewer</option>
                <?php else : ?>
                    <option default value="<?= $data1['id_petugas'] ?>"><?= $data1['nama_petugas'] ?></option>
                    <?php while ($petugas = mysqli_fetch_assoc($petugasQuery)) : ?>
                        <option value="<?= $petugas['id_petugas'] ?>"><?= $petugas['nama_petugas'] ?></option>
                    <?php endwhile; ?>
                <?php endif; ?>
            </select>

            <!-- Select for reviewer 2 -->
            <p>Reviewer 2</p>
            <select id="reviewer2" name="reviewer2" required>
                <?php $data2 =  mysqli_fetch_assoc($query2);
                $ulasan = mysqli_fetch_assoc($cekUlasan);
                $id_petugas2 = $data2['id_petugas'];
                $cekUlasan2 = mysqli_query($koneksi, "SELECT * FROM ulasan WHERE id_pengajuan = $id_pengajuan AND id_petugas = $id_petugas2");
                if (mysqli_num_rows($cekUlasan2)) : ?>
                    <option value="<?= $data2['id_petugas'] ?>">Tidak bisa mengupdate reviewer</option>
                <?php else : ?>
                    <option default value="<?= $data2['id_petugas'] ?>"><?= $data2['nama_petugas'] ?></option>
                    <?php while ($petugas2 = mysqli_fetch_assoc($petugasQuery2)) : ?>
                        <option value="<?= $petugas2['id_petugas'] ?>"><?= $petugas2['nama_petugas'] ?></option>
                    <?php endwhile; ?>
                <?php endif; ?>
            </select>
            <button name="submit" class="btn">Tugaskan</button>
        </form>
    </div>
</div>