<div class="row">
    <div class="col s12 m9">
        <h3 class="orange-text">Data Tahun Penelitian</h3>
    </div>
    <div class="col s12 m3">
        <div class="section"></div>
        <a class="waves-effect waves-light btn modal-trigger green" href="#modal1"><i class="material-icons">add</i></a>
    </div>
</div>
<table id="example" class="display responsive-table" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Tahun Penelitian</th>
            <th>status</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $tampil = mysqli_query($koneksi, "SELECT * FROM th_penelitian ORDER BY th_penelitian ASC");
        while ($r = mysqli_fetch_assoc($tampil)) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $r['th_penelitian'];
                    echo "/" ?><?= $r['th_penelitian2']; ?> </td>
                <td><?= $r['status']; ?></td>

                <td><a style="background-color: #6ea01d;" class="btn" href="tahunAktif.php?id_th_penelitian=<?= $r['id_th_penelitian'] ?>">Aktifkan</a>
                    <a style="background-color: #6ea01d;" class="btn" href="tahunNonaktif.php?id_th_penelitian=<?= $r['id_th_penelitian'] ?>">NonAktifkan</a>
                    <a style="background-color: #6ea01d;" class="btn" onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" href="index.php?p=th_penelitian_hapus&id_th_penelitian=<?= $r['id_th_penelitian'] ?>">Hapus</a>
                </td>
            </tr>
        <?php  } ?>
    </tbody>
</table>

<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Add</h4>
        <form method="POST">
            <div class="col s12 input-field">
                <label for="th_penelitian">Tahun Penelitian</label>
                <br>
                <div class="row">
                    <div class="col s6">
                        <select name="th_penelitian" id="th_pennelitian">
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                        </select>
                    </div>
                    <div class="col s6">
                        <select name="th_penelitian2" id="th_penelitian2">
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col s12 input-field">
                <label for="status">Status</label>
                <br>
                <select class="default" name="status">
                    <option value="default"></option>
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Non Aktif</option>
                </select>
            </div>
            <div class="col s12 input-field">
                <button type="submit" name="simpan" class="btn right">Simpan</button>
            </div>
        </form>
        <?php
        if (isset($_POST['simpan'])) {
            $th_penelitian = $_POST['th_penelitian'];
            $th_penelitian2 = $_POST['th_penelitian2'];
            $status        = $_POST['status'];
            $query = mysqli_query($koneksi, "INSERT INTO th_penelitian (th_penelitian,th_penelitian2,status) VALUES ('$th_penelitian','$th_penelitian2','$status')");
            if ($query) {
                echo "<script>alert('Berhasil')</script>";
                // echo "<script>location='index.php?p=th_penelitian'</script>";
            } else {
                echo "<script>alert('Gagal')</script>";
            }
        }
        ?>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>