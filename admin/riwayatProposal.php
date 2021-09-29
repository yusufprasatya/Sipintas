<?php
$id_petugas = $_SESSION['data']['id_petugas'];

?>
<div class="row">
    <div class="col s12 m9">
        <h3 class="orange-text">Riwayat Proposal </h3>
    </div>
</div>
<table id="example" class="display responsive-table" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>NIDN</th>
            <th>Nama</th>
            <th>Judul</th>
            <th>Tanggal Pengajuan</th>
            <th>Status</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM pengajuan WHERE status != 'proses' AND status != 'review' ORDER BY pengajuan.id_pengajuan ASC");
        while ($r = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $r['nidn']; ?></td>
                <td><?= $r['nm_pengusul']; ?></td>
                <td><?= $r['judul_penelitian']; ?></td>
                <td><?= $r['tgl_pengajuan']; ?></td>
                <td><?= $r['status']; ?></td>
                <td>
                    <a class="btn modal-trigger green" href="#more?id_pengajuan=<?= $r['id_pengajuan'] ?>">Detail</a>

                </td>

                <!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
                <!-- Modal Structure -->
                <div id="more?id_pengajuan=<?= $r['id_pengajuan'] ?>" class="modal">
                    <div class="modal-content">
                        <h4 class="orange-text">Detail</h4>
                        <div class="">
                            <p>Status : <?= $r['status']; ?></p>
                            <p>NIDN : <?= $r['nidn']; ?></p>
                            <p>Nama Pengusul : <?= $r['nm_pengusul']; ?></p>
                            <p>Tanggal Pengajuan : <?= $r['tgl_pengajuan']; ?></p>
                            <p>Bidang Ilmu : <?= $r['bidang_ilmu']; ?></p>
                            <p>Jumlah Anggota : <?= $r['jmlh_anggota']; ?> Orang</p>
                            <p>Biaya Yang Diusulkan : <?= rupiah($r['biaya_diusulkan']); ?></p>
                            <br><b>Judul Penelitian</b>
                            <p><?= $r['judul_penelitian']; ?></p>
                        </div>
                    </div>
                    <div class="modal-footer col s12">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                    </div>
                </div>
            </tr>
        <?php  } ?>
    </tbody>
</table>