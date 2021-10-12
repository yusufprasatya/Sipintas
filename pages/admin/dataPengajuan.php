<div class="row">
    <div class="col s12 m9">
        <h3 class="orange-text">Pengajuan</h3>
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
            <th>Penugasan</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $id_petugas = $_SESSION['data']['id_petugas'];
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM pengajuan INNER JOIN dosen ON pengajuan.id_dosen=dosen.id_dosen WHERE status='proses' ORDER BY pengajuan.id_pengajuan ASC");
        while ($data = mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['nidn']; ?></td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['judul_penelitian']; ?></td>
                <td><?= $data['tgl_pengajuan']; ?></td>
                <td><?= $data['status']; ?></td>
                <td> <a class="btn modal-trigger green" href="index.php?page=update-tugas&id_pengajuan=<?= $data['id_pengajuan'] ?>">Tugaskan</a></td>
                <td>
                    <a class="btn modal-trigger green" href="#more?id_pengajuan=<?= $data['id_pengajuan'] ?>">Detail</a> <a style="background-color: #6ea01d;" class="btn" onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" href="pengajuan_hapus.php?id_pengajuan=<?= $data['id_pengajuan'] ?>">Hapus</a>

                </td>

                <!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
                <!-- Modal Structure -->
                <div id="more?id_pengajuan=<?= $data['id_pengajuan'] ?>" class="modal">
                    <div class="modal-content">
                        <h4 class="orange-text">Detail</h4>
                        <div class="">
                            <p>Status Reviewer 1 : <?= $data['status']; ?></p>
                            <p>NIDN : <?= $data['nidn']; ?></p>
                            <p>Nama Pengusul : <?= $data['nama']; ?></p>
                            <p>Tanggal Pengajuan : <?= $data['tgl_pengajuan']; ?></p>
                            <p>Bidang Ilmu : <?= $data['bidang_ilmu']; ?></p>
                            <p>Jumlah Anggota : <?= $data['jmlh_anggota']; ?> Orang</p>
                            <p>Biaya Yang Diusulkan : <?= rupiah($data['biaya_diusulkan']); ?></p>
                            <br><b>Judul Penelitian</b>
                            <p><?= $data['judul_penelitian']; ?></p>
                        </div>
                    </div>
                    <div class="modal-footer col s12">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                    </div>
                </div>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>