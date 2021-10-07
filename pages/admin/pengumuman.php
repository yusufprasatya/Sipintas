<div class="row">
    <div class="col s12 m9">
        <h3 class="orange-text">Pengumuman</h3>
    </div>
    <div class="col s12 m3">
        <div class="section"></div>
        <a class="waves-effect waves-light btn green" href="index.php?p=tambah_pengumuman">Tambahkan</a>
    </div>
</div>
<table id="example" class="display responsive-table" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Keterngan</th>
            <th>File</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM pengumuman");
        while ($data = mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['tanggal']; ?></td>
                <td><?= $data['keterangan']; ?></td>
                <td><a target="_blank" href="view/view_pengumuman.php?id=<?= $data['id']; ?>">Lihat File</a></td>
                <td><a class="btn modal-trigger green " href="index.php?p=hapus_pengumuman&id=<?= $data['id'] ?>">Hapus</a></td>
            </tr>
        <?php endwhile;   ?>
    </tbody>
</table>