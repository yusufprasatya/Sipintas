<div class="row">
    <div class="col s12 m9">
        <h3 class="orange-text">Diterima</h3>
    </div>
</div>
<table id="example" class="display responsive-table" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>NIDN</th>
            <th>Nama</th>
            <th>Judul</th>
            <th>Status</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nidn = $_SESSION['data']['nidn'];
        $no = 1;
        $pengajuan = mysqli_query($koneksi, "SELECT * FROM pengajuan WHERE nidn = '$nidn' AND status='ditolak'");
        while ($data = mysqli_fetch_assoc($pengajuan)) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['nidn']; ?></td>
                <td><?= $data['nm_pengusul']; ?></td>
                <td><?= $data['judul_penelitian']; ?></td>
                <td><?= $data['status']; ?></td>
                <td><a class="btn green modal-trigger" href="#more?id_pengajuan=<?= $data['id_pengajuan'] ?>">Detail</a></td>

                <!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
                <!-- Modal Structure -->
                <div id="more?id_pengajuan=<?= $data['id_pengajuan']; ?>" class="modal">


                    <div class="modal-content">
                        <h4 class="orange-text">Detail</h4>
                        <div class="col s12">
                            <p>Status : <?= $data['status']; ?></p>
                            <p>NIDN : <?= $data['nidn']; ?></p>
                            <p>Dari : <?= $data['nm_pengusul']; ?></p>
                            <p>Tanggal Masuk : <?= $data['tgl_pengajuan']; ?></p>
                            <?php
                            $id_pengajuan = $data['id_pengajuan'];
                            $query = mysqli_query($koneksi, "SELECT * FROM ulasan WHERE id_pengajuan ='$id_pengajuan'");
                            $no = 1;
                            while ($data = mysqli_fetch_assoc($query)) : ?>
                                <br><b>Ulasan Reviewer <?= $no++; ?></b>
                                <p>Tanggal Ditanggapi : <?= $data['tgl_ulasan']; ?></p>
                                <p><?= $data['ulasan']; ?></p>
                            <?php endwhile; ?>

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