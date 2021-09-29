<div class="row">
    <div class="col s12 m9">
        <h3 class="orange-text">Detail Laporan Kemajuan</h3>
    </div>
</div>
<table id="example" class="display responsive-table" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Kegiatan</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $id_pengajuan = $_GET['id_pengajuan'];
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM laporan_kemajuan WHERE id_pengajuan='$id_pengajuan' ");
        while ($r = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $r['tgl_diajukan']; ?></td>
                <td><a target="_blank" href="view/laporan_kemajuan.php?id_laporan_kemajuan=<?= $r['id'] ?>">Lihat Laporan</a>
                </td>
            </tr>
        <?php  } ?>
    </tbody>
</table>