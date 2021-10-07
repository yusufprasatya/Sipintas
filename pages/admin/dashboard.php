<h3 class="orange-text">Dahsboard</h3>
<div class="row">
    <div class="col s4">
        <div class="card blue">
            <div class="card-content white-text">
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM pengajuan");
                $total_data = mysqli_num_rows($query);
                if ($total_data < 1) {
                    $total_data = 0;
                }
                ?>
                <span class="card-title">Total Proposal<b class="right"><?= $total_data; ?></b></span>
                <p></p>
            </div>
        </div>
    </div>
    <div class="col s4">
        <div style="background-color: #b26941;" class="card">
            <div class="card-content white-text">
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM petugas WHERE level='reviewer'");
                $total_data = mysqli_num_rows($query);
                if ($total_data < 1) {
                    $total_data = 0;
                }
                ?>
                <span class="card-title">Jumlah Reviewer<b class="right"><?= $total_data; ?></b></span>
                <p></p>
            </div>
        </div>
    </div>
    <div class="col s4">
        <div class="card teal">
            <div class="card-content white-text">
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM dosen");
                $jlmmember = mysqli_num_rows($query);
                if ($jlmmember < 1) {
                    $jlmmember = 0;
                }
                ?>
                <span class="card-title">Jumlah Dosen<b class="right"><?= $jlmmember; ?></b></span>
                <p></p>
            </div>
        </div>
    </div>
</div>