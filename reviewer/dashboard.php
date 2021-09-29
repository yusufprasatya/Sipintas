<h3 class="orange-text">Dashboard</h3>
<div class="row">
    <div class="col s4">
        <div style="background-color: #b26941;" class="card">
            <div class="card-content white-text">
                <?php
                $id_petugas = $_SESSION['data']['id_petugas'];
                // $query = mysqli_query($koneksi, "SELECT * FROM pengajuan WHERE status='proses'");
                $query = mysqli_query($koneksi, "SELECT * FROM pengajuan WHERE (penugasan1= $id_petugas OR penugasan2 = $id_petugas) AND (status='review')");
                $jlmmember = mysqli_num_rows($query);
                if ($jlmmember < 1) {
                    $jlmmember = 0;
                } ?>
                <span class="card-title">Belum Di Review<b class="right"><?= $jlmmember; ?></b></span>
                <p></p>
            </div>
        </div>
    </div>
    <div class="col s4">
        <div class="card teal">
            <div class="card-content white-text">
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM ulasan WHERE id_petugas='$id_petugas'");
                $jlmmember = mysqli_num_rows($query);
                if ($jlmmember < 1) {
                    $jlmmember = 0;
                }
                ?>
                <span class="card-title">Sudah Di Review<b class="right"><?= $jlmmember; ?></b></span>
                <p></p>
            </div>
        </div>
    </div>
</div>