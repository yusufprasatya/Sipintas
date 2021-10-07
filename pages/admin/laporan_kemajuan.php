<?php
$id_petugas = $_SESSION['data']['id_petugas'];
?>
<div class="row">
    <div class="col s12 m9">
        <h3 class="orange-text">Laporan Kemajuan</h3>
    </div>
</div>
<table id="example" class="display responsive-table" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>NIDN</th>
            <th>Nama</th>
            <th>Judul</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM pengajuan WHERE status='diterima' ");
        while ($data = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['nidn']; ?></td>
                <td><?= $data['nm_pengusul']; ?></td>
                <td><?= $data['judul_penelitian']; ?></td>
                <td><a class="btn modal-trigger green " href="index.php?p=detail_laporan_kemajuan&id_pengajuan=<?= $data['id_pengajuan'] ?>">Detail</a></td>
            </tr>
        <?php  }
        ?>
    </tbody>
</table>