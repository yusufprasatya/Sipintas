<div class="row">
    <div class="col s12 m9">
        <h3 class="orange-text">Laporan Kegiatan Harian</h3>
    </div>
    <div class="col s12 m3">
        <div class="section"></div>
        <a class="waves-effect waves-light btn green" href="index.php?page=form-laporan-harian&id_pengajuan=<?= $data['id_pengajuan'] ?>">Tambahkan</a>
    </div>
</div>
<table id="example" class="display responsive-table" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Kegiatan</th>
            <th>File</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $id_dosen = $_SESSION['data']['id_dosen'];
        $id_pengajuan = $_GET['id_pengaujan'];
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM laporan_harian WHERE id_dosen ='$id_dosen'");
        while ($data = mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['tgl_kegiatan']; ?></td>
                <td><?= $data['kegiatan']; ?></td>
                <td><a target="_blank" href="view/view_laporan_harian.php?id_kegiatan=<?= $data['id_kegiatan']; ?>">Lihat</a></td>
                <td><a class="btn modal-trigger green " href="index.php?p=kegiatan_hapus&id_kegiatan=<?= $data['id_kegiatan'] ?>">Hapus</a></td>
            </tr>
        <?php endwhile;  ?>
    </tbody>
</table>