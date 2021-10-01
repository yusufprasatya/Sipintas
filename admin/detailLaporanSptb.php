<div class="row">
    <div class="col s12 m9">
        <h3 class="orange-text">Detail Laporan SPTB</h3>
    </div>
</div>
<table id="example" class="display responsive-table" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Upload</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $id_pengajuan = $_GET['id_pengajuan'];
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM laporan_sptb WHERE id_pengajuan='$id_pengajuan' ");
        while ($data = mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['tgl_upload']; ?></td>
                <td><a target="_blank" href="view/laporanSptb.php?id_laporan_sptb=<?= $data['id'] ?>">Lihat Laporan</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>