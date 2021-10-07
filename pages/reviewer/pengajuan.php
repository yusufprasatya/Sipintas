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
        $id_petugas = $_SESSION['data']['id_petugas'];
        $query = "SELECT * FROM pengajuan WHERE (penugasan1= $id_petugas OR penugasan2 = $id_petugas) AND (status='review')";
        $proposalAkanDiulas = query($query);
        foreach ($proposalAkanDiulas as $result) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $result['nidn']; ?></td>
                <td><?= $result['nm_pengusul']; ?></td>
                <td><?= $result['judul_penelitian']; ?></td>
                <td><?= $result['tgl_pengajuan']; ?></td>
                <td><?= $result['status']; ?></td>
                <td><a class="btn modal-trigger green " href="#more?id_pengajuan=<?= $result['id_pengajuan'] ?>">Detail</a> </td>
                <!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
                <!-- Modal Structure -->
                <div id="more?id_pengajuan=<?= $result['id_pengajuan'] ?>" class="modal">
                    <div class="modal-content">
                        <h4 class="orange-text">Detail</h4>
                        <div class="">
                            <p>Status : <?= $result['status']; ?></p>
                            <p>NIDN : <?= $result['nidn']; ?></p>
                            <p>Nama Pengusul : <?= $result['nm_pengusul']; ?></p>
                            <p>Tanggal Pengajuan : <?= $result['tgl_pengajuan']; ?></p>
                            <p>Bidang Ilmu : <?= $result['bidang_ilmu']; ?></p>
                            <p>Jumlah Anggota : <?= $result['jmlh_anggota']; ?></p>
                            <p>Biaya yang diusulkan : <?= rupiah($result['biaya_diusulkan']); ?></p>
                            <br><b>Judul Penelitian</b>
                            <p><?= $result['judul_penelitian']; ?></p>

                            <br><b>Berkas Lain-lain</b>
                            <p>Halaman Pengesahan ( Lampiran B.3)<a target="_blank" href="view/b3.php?nidn=<?= $result['nidn']; ?>"> Lihat File</a></p>
                            <p>Identifikasi & Uraian Umum Penelitian (Lampiran B.5) <a target="_blank" href="view/b5.php?nidn=<?= $result['nidn']; ?>"> Lihat File</a></p>
                            <p>Proposal Penelitian (Lampiran B.6a) <a target="_blank" href="view/b6a.php?nidn=<?= $result['nidn']; ?>"> Lihat File</a></p>
                            <p>Justifkasi Rencana Anggaran Biaya Penelitian ( Lampiran B.7) <a target="_blank" href="view/b7.php?nidn=<?= $result['nidn']; ?>"> Lihat File</a></p>
                            <p>Personalia Peneliti (Lampiran B.8))<a target="_blank" href="view/b8.php?nidn=<?= $result['nidn']; ?>"> Lihat File</a></p>
                            <p>Biodata Ketua dan Anggota Peneliti (Lampiran B.9)<a target="_blank" href="view/b9.php?nidn=<?= $result['nidn']; ?>"> Lihat File</a></p>
                            <p>Surat Pernyataan Orisinalitas (Lampiran B.10)<a target="_blank" href="view/b10.php?nidn=<?= $result['nidn']; ?>"> Lihat File</a></p>
                        </div>
                        <div class="">
                            <form action="prosesUlas.php" method="POST">
                                <br><b>Penilaian</b>
                                <input type="text" hidden name="id_pengajuan" id="id_pengajuan" value="<?= $result['id_pengajuan'] ?>">
                                <div class="row">
                                    <div class="col s1">No</div>
                                    <div class="col s3">Kriteria</div>
                                    <div class="col s4">Indikator Penilaian</div>
                                    <div class="col s2">Bobot (%)</div>
                                    <div class="col s2">Skor</div>
                                </div>
                                <div class="row">
                                    <div class="col s1">1</div>
                                    <div class="col s3">Perumusan masalah </div>
                                    <div class="col s4">Ketajaman perumusan masalah dan tujuan penelitian </div>
                                    <div class="col s2">30</div>
                                    <div class="col s2">
                                        <input type="number" name="skor1" id="skor1" required>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s1">2</div>
                                    <div class="col s3">Manfaat hasil penelitian</div>
                                    <div class="col s4">Pengembangan IPTEKS, pembangunan, dan/atau pengembangan kelembagaan </div>
                                    <div class="col s2">20</div>
                                    <div class="col s2">
                                        <input type="number" name="skor2" id="skor2" required>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col s1">3</div>
                                    <div class="col s3">Tinjauan pustaka </div>
                                    <div class="col s4">Relevansi, kemutakhiran, dan penyusunan daftar pustaka </div>
                                    <div class="col s2">15</div>
                                    <div class="col s2">
                                        <input type="number" name="skor3" id="skor3" required>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col s1">4</div>
                                    <div class="col s3">Metode penelitian</div>
                                    <div class="col s4">Ketepatan metode yang digunakan </div>
                                    <div class="col s2">25</div>
                                    <div class="col s2">
                                        <input type="number" name="skor4" id="skor4" required>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col s1">5</div>
                                    <div class="col s3">Kelayakan penelitian </div>
                                    <div class="col s4">Kesesuaian jadwal, keahlian personalia, kewajaran biaya </div>
                                    <div class="col s2">10</div>
                                    <div class="col s2">
                                        <input type="number" name="skor5" id="skor5" required>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col s1"></div>
                                    <div class="col s3">Alasan Penolakan </div>
                                    <div class="col s4">
                                        <p>Silahkan Pilih (a,b,c,d,e,f,g,h,i)</p>
                                        <a target="_blank" href="view/alasan_penolakan.php"> Lihat Detail</a>
                                    </div>
                                    <div class="col s2">
                                        <input type="text" name="alasan_penolakan" id="alasan_penolakan" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s1"></div>
                                    <div class="col s3">Biaya Yang Disetujui</div>
                                    <div class="col s7">
                                        <input type="number" name="biaya_disetujui" id="biaya_disetujui">
                                        <div class="row">
                                            <div class="col s12">
                                                <sup>Tuliskan dalam bentuk angka tanpa (titk) dan (koma). Contoh 3500000</sup>
                                                <sup>Tuliskan 0 jika tidak ada dana yang disetujui.</sup>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 input-field">
                                    <label for="textarea">Ulasan</label>
                                    <textarea id="textarea" name="ulasan" class="materialize-textarea" required></textarea>
                                </div>
                                <div class="col s3 input-field">
                                    <input type="submit" name="tanggapi" value="Kirim" class="btn right">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer col s12">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                    </div>
                </div>
                <!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>