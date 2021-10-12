<?php
$id_pengajuan = $_GET['id_pengajuan'] ?? "";
$id_petugas = $_SESSION['data']['id_petugas'];

if (isset($_POST['submit'])) {
    $status_proposal = $_POST['status_proposal'];
    $update = mysqli_query($koneksi, "UPDATE pengajuan SET status = '$status_proposal'  WHERE id_pengajuan = '$id_pengajuan'");
    if ($update) {
        echo "<script>alert('Success');</script>";
        echo "<script>location='index.php?page=data-ulasan';</script>";
    }
}
?>
<div class="row">
    <div class="col s12 m9">
        <h3 class="orange-text">Status Proposal</h3>
    </div>
</div>

<div class="row">
    <div class="col s12 m9">
        <form action="" method="POST">
            <p>Status</p>
            <select id="status_proposal" name="status_proposal">
                <option value="default"></option>
                <option id="status_proposal" value="diterima">Diterima</option>
                <option id="status_proposal" value="ditolak">Ditolak</option>
            </select>
            <button name="submit" class="btn">Submit</button>
        </form>
    </div>
</div>