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

            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $id_petugas = $_GET['id_petugas'] ?? "";
        $no = 1;
        $ulasan = "SELECT * FROM pengajuan INNER JOIN ulasan ON pengajuan.id_pengajuan=ulasan.id_pengajuan INNER JOIN petugas ON ulasan.id_petugas=petugas.id_petugas INNER JOIN dosen ON pengajuan.nidn=dosen.nidn WHERE ulasan.id_petugas='$id_petugas' ORDER BY ulasan.id_ulasan ASC";
        $ulasans = query($ulasan);
        foreach ($ulasans as $ulasan) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['nidn']; ?></td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['judul_penelitian']; ?></td>
                <td><?= $data['tgl_pengajuan']; ?></td>

                <td><a class="btn modal-trigger green " href="#more?id_ulasan=<?= $data['id_ulasan'] ?>">Detail</a> <a style="background-color: #6ea01d;" class="btn" onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" href="index.php?p=ulasan_hapus&id_ulasan=<?= $data['id_ulasan'] ?>">Hapus</a></td>
                <!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
                <!-- Modal Structure -->
                <div id="more?id_ulasan=<?= $data['id_ulasan'] ?>" class="modal">
                    <div class="modal-content">
                        <h4 class="orange-text">Detail</h4>
                        <a class="btn modal-trigger green " target="blank" href="cetak_ulasan.php?id_ulasan=<?= $data['id_ulasan'] ?>">Print</a>
                        <a class="btn" target="_blank" href="surat_persetujuan.php?nidn=<?= $data['nidn']; ?>"> Print</a>
                        <div class="">
                            <p>Status Ulasan Sementara : <?= $data['status_ulasan']; ?></p>
                            <p>NIDN : <?= $data['nidn']; ?></p>
                            <p>Nama Pengusul : <?= $data['nama']; ?></p>
                            <p>Tanggal Pengajuan : <?= $data['tgl_pengajuan']; ?></p>
                            <p>Bidang Ilmu : <?= $data['bidang_ilmu']; ?></p>
                            <p>Biaya Yang Diusulkan : <?= rupiah($data['biaya_diusulkan']); ?></p>
                            <br><b>Judul Penelitian</b>
                            <p><?= $data['judul_penelitian']; ?></p>
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
                            <div class="col s1"><?= $data['skor1']; ?></div>
                            <div class="col s1"><?= $data['nilai1']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col s1">2</div>
                            <div class="col s2">Manfaat hasil penelitian</div>
                            <div class="col s6">Pengembangan IPTEKS,pembangunan,dan/atau pengembangan kelembagaan</div>
                            <div class="col s1">20</div>
                            <div class="col s1"><?= $data['skor2']; ?></div>
                            <div class="col s1"><?= $data['nilai2']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col s1">3</div>
                            <div class="col s2">Tinjauan pustaka</div>
                            <div class="col s6">Relevansi, kemutakhiran, dan penyusunan daftar pustaka</div>
                            <div class="col s1">15</div>
                            <div class="col s1"><?= $data['skor3']; ?></div>
                            <div class="col s1"><?= $data['nilai3']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col s1">4</div>
                            <div class="col s2">Metode penelitian</div>
                            <div class="col s6">Ketepatan metode yang digunakan</div>
                            <div class="col s1">25</div>
                            <div class="col s1"><?= $data['skor4']; ?></div>
                            <div class="col s1"><?= $data['nilai4']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col s1">5</div>
                            <div class="col s2">Kelayakan penelitian</div>
                            <div class="col s6"> Kesesuaian jadwal, keahlian personalia,kewajaran biaya</div>
                            <div class="col s1">10</div>
                            <div class="col s1"><?= $data['skor5']; ?></div>
                            <div class="col s1"><?= $data['nilai5']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col s1"></div>
                            <div class="col s8">Total</div>
                            <div class="col s1">100</div>
                            <div class="col s1"><?= $data['total_skor']; ?></div>
                            <div class="col s1"><?= $data['total_nilai']; ?></div>
                        </div>
                    </div>
                    <div class="modal-footer col s12">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                    </div>
                </div>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>