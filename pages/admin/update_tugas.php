<?php
include_once '../../config/koneksi.php';
$id_pengajuan = $_GET['id_pengajuan'] ?? "";
$id_petugas = $_SESSION['data']['id_petugas'];

if (isset($_POST['submit'])) {
    $penugasan1 = $_POST['reviewer1'];
    $penugasan2 = $_POST['reviewer2'];
    $update = mysqli_query($koneksi, "UPDATE pengajuan SET penugasan1 = '$penugasan1', penugasan2 = '$penugasan2', status = 'review'  WHERE id_pengajuan = '$id_pengajuan'");
    if ($update) {
        echo "<script>alert('Success');</script>";
        echo "<script>location='index.php?p=data_pengajuan';</script>";
    }
} ?>
<div class="row">
    <div class="col s12 m9">
        <h3 class="orange-text">Penugasan Reviewer</h3>
    </div>
</div>

<div class="row">
    <div class="col s12 m9">
        <form action="" method="POST">
            <?php
            $query1 = mysqli_query($koneksi, "SELECT * FROM petugas WHERE level='reviewer'");
            ?>
            <!-- Select for reviewer 1 -->
            <p>Reviewer 1</p>
            <select id="reviewer1" name="reviewer1">
                <?php while ($data = mysqli_fetch_array($query1)) : ?>
                    <option id="reviewer1" value=" <?= $data['id_petugas']; ?>"> <?= $data['nama_petugas']; ?></option>
                <?php endwhile; ?>
            </select>

            <!-- Select for reviewer 2 -->
            <p>Reviewer 2</p>
            <?php
            $query2 = mysqli_query($koneksi, "SELECT * FROM petugas WHERE level='reviewer' ORDER BY nama_petugas DESC");
            ?>
            <select id="reviewer2" name="reviewer2">
                <option value="default"></option>
                <?php while ($data = mysqli_fetch_array($query2)) : ?>
                    <option id="reviewer2" value=" <?= $data['id_petugas']; ?>"> <?= $data['nama_petugas']; ?></option>
                <?php endwhile; ?>
            </select>
            <button name="submit" class="btn">Tugaskan</button>
        </form>
    </div>
</div>