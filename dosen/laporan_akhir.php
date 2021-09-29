<?php
include 'conn/koneksi.php';
$id_dosen = $_SESSION['data']['id_dosen'];
$query1 = mysqli_query($koneksi, "SELECT * FROM pengajuan WHERE id_dosen ='$id_dosen' ");
$data =  mysqli_fetch_assoc($query1);

?>


<div class="row">
    <div class="col s12 m9">
        <h3 class="orange-text">Laporan Akhir</h3>
    </div>
    <div class="col s12 m3">
        <div class="section"></div>
        <a class="waves-effect waves-light btn green" href="index.php?p=form_laporan_akhir&id_pengajuan=<?= $data['id_pengajuan'] ?>">Tambahkan</a>
    </div>
</div>
<table id="example" class="display responsive-table" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>File</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM laporan_akhir WHERE id_dosen ='$id_dosen'");
        while ($r = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $r['tgl_upload']; ?></td>
                <td><a target="_blank" href="view/view_laporan_akhir.php?id=<?= $r['id_laporan_akhir']; ?>">Lihat Laporan</a></td>
                <td><a class="btn modal-trigger green " href="index.php?p=hapus_laporan_kemajuan&id=<?= $r['id'] ?>">Hapus</a></td>
            </tr>
        <?php  }
        ?>
    </tbody>
</table>