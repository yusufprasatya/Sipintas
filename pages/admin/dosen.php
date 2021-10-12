<div class="row">
    <div class="col s12 m9">
        <h3 class="orange-text">Dosen</h3>
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
            <th>NIDN</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Telp</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM dosen ORDER BY id_dosen ASC");
        while ($data = mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['nidn']; ?></td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['username']; ?></td>
                <td><?= $data['telp']; ?></td>
                <td><a class="btn green modal-trigger" href="#regis_edit?nidn=<?= $data['nidn'] ?>">Edit</a> <a style="background-color: #6ea01d;" onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" class="btn" href="index.php?p=regis_hapus&id_dosen=<?= $data['id_dosen'] ?>">Hapus</a></td>
                <!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
                <!-- Modal Structure -->
                <div id="regis_edit?nidn=<?= $data['nidn'] ?>" class="modal">
                    <div class="modal-content">
                        <h4>Edit</h4>
                        <form method="POST">
                            <input hidden type="text" name="id_dosen" value="<?= $data['id_dosen']; ?>" required>
                            <div class="col s12 input-field">
                                <label for="nidn">Nidn</label>
                                <input id="nidn" type="number" name="nidn" value="<?= $data['nidn']; ?>" required>
                            </div>
                            <div class="col s12 input-field">
                                <label for="nama">Nama</label>
                                <input id="nama" type="text" name="nama" value="<?= $data['nama']; ?>" required>
                            </div>
                            <div class="col s12 input-field">
                                <label for="username">Username</label>
                                <input id="username" type="text" name="username" value="<?= $data['username']; ?>" required><br><br>
                            </div>
                            <div class="col s12 input-field">
                                <label for="password">password</label>
                                <input id="password" type="password" name="password" value="<?= $data['password']; ?>" required><br><br>
                            </div>
                            <div class="col s12 input-field">
                                <label for="telp">Telp</label>
                                <input id="telp" type="number" name="telp" value="<?= $data['telp']; ?>" required><br><br>
                            </div>
                            <div class="col s12 input-field">
                                <input type="submit" name="Update" value="Simpan" class="btn right">
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['Update'])) {
                            $password = md5($_POST['password']);
                            $update = mysqli_query($koneksi, "UPDATE dosen SET nidn='" . $_POST['nidn'] . "',nama='" . $_POST['nama'] . "',username='" . $_POST['username'] . "',password='$password',telp='" . $_POST['telp'] . "' WHERE id_dosen='" . $_POST['id_dosen'] . "' ");
                            if ($update) {
                                echo "<script>alert('Berhasil')</script>";
                                echo "<script>location='index.php?p=registrasi'</script>";
                            }
                        } ?>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                    </div>
                </div>
                <!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Add</h4>
        <form method="POST">
            <div class="col s12 input-field">
                <label for="nidn">NIDN</label>
                <input id="nidn" type="number" name="nidn" required>
            </div>
            <div class="col s12 input-field">
                <label for="nama">Nama</label>
                <input id="nama" type="text" name="nama" required>
            </div>
            <div class="col s12 input-field">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" required><br><br>
            </div>
            <div class="col s12 input-field">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required><br><br>
            </div>
            <div class="col s12 input-field">
                <label for="telp">Telp</label>
                <input id="telp" type="number" name="telp" required><br><br>
            </div>
            <div class="col s12 input-field">
                <input type="submit" name="simpan" value="Simpan" class="btn right">
            </div>
        </form>
        <?php
        if (isset($_POST['simpan'])) {
            $password = md5($_POST['password']);
            $query = mysqli_query($koneksi, "INSERT INTO dosen (nidn,nama,username,password,telp) VALUES ('" . $_POST['nidn'] . "','" . $_POST['nama'] . "','" . $_POST['username'] . "','" . $password . "','" . $_POST['telp'] . "')");
            if ($query) {
                echo "<script>alert('Berhasil')</script>";
                echo "<script>location='location:index.php?page=dosen';</script>";
            }
        }
        ?>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>