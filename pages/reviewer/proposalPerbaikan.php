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
        $id_petugas = $_SESSION['reuslt$result']['id_petugas'];
        $query = ("SELECT * FROM proposal_perbaikan INNER JOIN pengajuan ON pengajuan.id_pengajuan=proposal_perbaikan.id_pengajuan INNER JOIN ulasan ON ulasan.id_pengajuan=pengajuan.id_pengajuan WHERE ulasan.id_petugas='$id_petugas'");
        $proposalDiperbaiki = query($query);
        $no = 1;
        foreach ($proposalDiperbaiki as $result) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $result['nidn']; ?></td>
                <td><?= $result['nm_pengusul']; ?></td>
                <td><?= $result['judul_penelitian']; ?></td>
                <td><?= $result['tgl_pengajuan']; ?></td>
                <td><?= $result['tgl_ulasan']; ?></td>
                <td>
                    <a target="_blank" href="view/file_proposal_diperbaiki.php?id_proposal_perbaikan=<?= $result['id_proposal_perbaikan']; ?>"> Lihat File</a>
                </td>
                <!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
                <!-- Modal Structure -->
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>