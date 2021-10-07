<div class="row">
    <div class="col s12 m9">
        <h3 class="orange-text">Ulasan</h3>
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
            <th>Telah Diulas</th>
            <th>Status</th>
            <th>Update Reviewer</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $id_petugas = $_SESSION['data']['id_petugas'];
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM pengajuan WHERE status = 'review'");

        while ($data = mysqli_fetch_assoc($query)) :
            $counting = mysqli_query($koneksi, "SELECT * FROM ulasan WHERE id_pengajuan = '" . $data['id_pengajuan'] . "' ");
            $total = mysqli_num_rows($counting);
        ?>

            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['nidn']; ?></td>
                <td><?= $data['nm_pengusul']; ?></td>
                <td><?= $data['judul_penelitian']; ?></td>
                <td><?= $data['tgl_pengajuan']; ?></td>
                <td><?= $total . " Reviewer"; ?></td>
                <td><?= $data['status']; ?></td>
                <td>
                    <?php if ($total != 2) : ?>
                        <a style="background-color: #6ea01d;" class="btn" href="index.php?p=update-reviewer&id_pengajuan=<?= $data['id_pengajuan'] ?>">Update</a>
                    <?php else : ?>
                        <p>Tidak bisa mengupdate reviewer</p>
                    <?php endif; ?>
                </td>

                <td>
                    <a class="btn modal-trigger green " href="#more?id_pengajuan=<?= $data['id_pengajuan'] ?>">Detail</a>
                </td>

                <!-- Modal Structure -->
                <div id="more?id_pengajuan=<?= $data['id_pengajuan'] ?>" class="modal">
                    <div class="modal-content">
                        <div class="row">
                            <div class="col m8">
                                <h4 class=" orange-text">Detail Ulasan</h4>
                                <?php if ($total != 0) : ?>
                                    <p class="">Status Proposal : <b> <?= $data['status']; ?></b></p>
                                    <a class="btn" href="index.php?p=updateStatus&id_pengajuan=<?= $data['id_pengajuan'] ?>">update</a>
                                <?php else : ?>
                                    <p style="font-size: 22px;">Tidak ada ulasan</ style="font-size: 22px;">
                                    <?php endif; ?>
                            </div>
                        </div>
                        <?php
                        $id_pengajuan = $data['id_pengajuan'];
                        $ulasanLoop = mysqli_query($koneksi, "SELECT * FROM ulasan INNER JOIN pengajuan ON pengajuan.id_pengajuan = ulasan.id_pengajuan INNER JOIN petugas ON ulasan.id_petugas = petugas.id_petugas WHERE ulasan.id_pengajuan = '$id_pengajuan'");
                        while ($data1 = mysqli_fetch_assoc($ulasanLoop)) : ?>
                            <div class="row">
                                <div class="col m8">
                                    <p>Nama Pengulas : <?= $data1['nama_petugas']; ?> (<?= $data1['status_ulasan'];; ?>)</p>
                                    <p>Tanggal Diulas : <?= $data1['tgl_ulasan']; ?></p>
                                    <p>Ulasan : <?= $data1['ulasan']; ?></p>
                                    <p>Biaya Yang Disetujui : <?= rupiah($data1['biaya_disetujui']); ?></p>
                                </div>
                            </div>

                            <br><b>Penilaian</b>
                            <div class="row">
                                <div class="col s1">No</div>
                                <div class="col s2">Kriteria</div>
                                <div class="col s6">Indikator Penilian</div>
                                <div class="col s1">Bobot</div>
                                <div class="col s1">Skor</div>
                                <div class="col s1">Nilai</div>
                            </div>
                            <div class="row">
                                <div class="col s1">1</div>
                                <div class="col s2">Perumusan masalah</div>
                                <div class="col s6">Ketajaman perumusan masalah dan tujuan penelitian</div>
                                <div class="col s1">30</div>
                                <div class="col s1"><?= $data1['skor1']; ?></div>
                                <div class="col s1"><?= $data1['nilai1']; ?></div>
                            </div>
                            <div class="row">
                                <div class="col s1">2</div>
                                <div class="col s2">Manfaat hasil penelitian</div>
                                <div class="col s6">Pengembangan IPTEKS,pembangunan,dan/atau pengembangan kelembagaan</div>
                                <div class="col s1">20</div>
                                <div class="col s1"><?= $data1['skor2']; ?></div>
                                <div class="col s1"><?= $data1['nilai2']; ?></div>
                            </div>
                            <div class="row">
                                <div class="col s1">3</div>
                                <div class="col s2">Tinjauan pustaka</div>
                                <div class="col s6">Relevansi, kemutakhiran, dan penyusunan daftar pustaka</div>
                                <div class="col s1">15</div>
                                <div class="col s1"><?= $data1['skor3']; ?></div>
                                <div class="col s1"><?= $data1['nilai3']; ?></div>
                            </div>
                            <div class="row">
                                <div class="col s1">4</div>
                                <div class="col s2">Metode penelitian</div>
                                <div class="col s6">Ketepatan metode yang digunakan</div>
                                <div class="col s1">25</div>
                                <div class="col s1"><?= $data1['skor4']; ?></div>
                                <div class="col s1"><?= $data1['nilai4']; ?></div>
                            </div>
                            <div class="row">
                                <div class="col s1">5</div>
                                <div class="col s2">Kelayakan penelitian</div>
                                <div class="col s6"> Kesesuaian jadwal, keahlian personalia,kewajaran biaya</div>
                                <div class="col s1">10</div>
                                <div class="col s1"><?= $data1['skor5']; ?></div>
                                <div class="col s1"><?= $data1['nilai5']; ?></div>
                            </div>
                            <div class="row">
                                <div class="col s1"></div>
                                <div class="col s8">Total</div>
                                <div class="col s1">100</div>
                                <div class="col s1"><?= $data1['total_skor']; ?></div>
                                <div class="col s1"><?= $data1['total_nilai']; ?></div>
                            </div>
                            <hr>
                        <?php endwhile; ?>
                    </div>
                    <div class="modal-footer col s12">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                    </div>
                </div>



            </tr>
        <?php endwhile; ?>
    </tbody>
</table>