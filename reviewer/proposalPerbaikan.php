<div class="row">
    <div class="col s12 m9">
        <h3 class="orange-text">Proposal</h3>
    </div>
</div>
<table id="example" class="display responsive-table" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>NIDN</th>
            <th>Nama Pengusul</th>
            <th>Judul</th>
            <th>Tanggal Pengajuan</th>
            <th>Tanggal Diulas</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $id_petugas = $_SESSION['data']['id_petugas'];
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM proposal_perbaikan INNER JOIN pengajuan ON pengajuan.id_pengajuan=proposal_perbaikan.id_pengajuan INNER JOIN ulasan ON ulasan.id_pengajuan=pengajuan.id_pengajuan WHERE ulasan.id_petugas='$id_petugas'");
        while ($data = mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['nidn']; ?></td>
                <td><?= $data['nm_pengusul']; ?></td>
                <td><?= $data['judul_penelitian']; ?></td>
                <td><?= $data['tgl_pengajuan']; ?></td>
                <td><?= $data['tgl_ulasan']; ?></td>
                <td>
                    <a target="_blank" href="view/file_proposal_diperbaiki.php?id_proposal_perbaikan=<?= $data['id_proposal_perbaikan']; ?>"> Lihat File</a>
                </td>
                <!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
                <!-- Modal Structure -->
            </tr>
        <?php endwhile; ?>

    </tbody>
</table>