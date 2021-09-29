<?php
$tahun =  $_GET['tahun'] ?? "";
$query1 = mysqli_query($koneksi, "SELECT * FROM pengumuman WHERE YEAR(tanggal) = '$tahun'");
while ($datas = mysqli_fetch_assoc($query1)) : ?>
    <div class="col s12 m6">
        <div class="card green darken-1">
            <div class="card-content white-text">
                <span class="card-title"><?= $datas['tanggal']; ?></span>
                <p style="font-size: 18px;"><?= $datas['keterangan']; ?></p>
            </div>
            <div class="card-action">
                <td><a target="_blank" href="view_pengumuman.php?id=<?= $datas['id']; ?>">Lihat</a></td>
            </div>
        </div>
    </div>
<?php endwhile; ?>