<div class="row">
    <div class="col s12 m9">
        <h3 class="orange-text">Petugas</h3>
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
            <th>Nama</th>
            <th>Username</th>
            <th>Telephone</th>
            <th>level</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $tampil = mysqli_query($koneksi, "SELECT * FROM petugas ORDER BY nama_petugas ASC");
        while ($data = mysqli_fetch_assoc($tampil)) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['nama_petugas']; ?></td>
                <td><?= $data['username']; ?></td>
                <td><?= $data['telp_petugas']; ?></td>
                <td><?= $data['level']; ?></td>
                <td><a class="btn green modal-trigger" href="#user_edit<?= $data['id_petugas'] ?>">Edit</a> <a style="background-color: #6ea01d;" class="btn" onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" href="index.php?p=user_hapus&id_petugas=<?= $data['id_petugas'] ?>">Hapus</a></td>

                <!-- Modal Structure -->
                <div id="user_edit<?= $data['id_petugas'] ?>" class="modal">
                    <div class="modal-content">
                        <h4>Edit</h4>
                        <form method="POST">
                            <div class="col s12 input-field">
                                <label for="nama">Nama</label>
                                <input hidden type="text" name="id_petugas" value="<?= $data['id_petugas']; ?>" required>
                                <input id="nama" type="text" name="nama" value="<?= $data['nama_petugas']; ?>" required>
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
                                <input id="telp" type="number" name="telp" value="<?= $data['telp_petugas']; ?>" required><br><br>
                            </div>
                            <div class="col s12 input-field">
                                <p>
                                    <label>
                                        <input value="admin" class="with-gap" name="level" type="radio" <?php if ($data['level'] == "admin") {
                                                                                                            echo "checked";
                                                                                                        } ?> />
                                        <span>Admin</span>
                                    </label>
                                    <label>
                                        <input value="reviewer" class="with-gap" name="level" type="radio" <?php if ($data['level'] == "reviewer") {
                                                                                                                echo "checked";
                                                                                                            } ?> />
                                        <span>Reviewer</span>
                                    </label>
                                </p>
                            </div>
                            <div class="col s12 input-field">
                                <input type="submit" name="Update" value="Simpan" class="btn right">
                            </div>
                        </form>

                        <?php
                        if (isset($_POST['Update'])) {
                            $password = md5($_POST['password']);
                            $update = mysqli_query($koneksi, "UPDATE petugas SET nama_petugas='" . $_POST['nama'] . "',username='" . $_POST['username'] . "',password='$password',telp_petugas='" . $_POST['telp'] . "',level='" . $_POST['level'] . "' WHERE id_petugas='" . $_POST['id_petugas'] . "' ");
                            if ($update) {
                                echo "<script>alert('Data di Update')</script>";
                                echo "<script>location='index.php?page=petugas'</script>";
                            }
                        }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                    </div>
                </div>
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
                <select class="default" name="level" required>
                    <option selected disabled="">Pilih Level</option>
                    <option value="admin">Admin</option>
                    <option value="reviewer">Reviewer</option>
                </select>
            </div>
            <div class="col s12 input-field">
                <input type="submit" name="input" value="Simpan" class="btn right">
            </div>
        </form>
        <?php
        if (isset($_POST['input'])) {
            $username = $_POST['username'];
            $dataesult = mysqli_query($koneksi, "SELECT username FROM dosen WHERE username = '$username'");
            $dataesult2 = mysqli_query($koneksi, "SELECT username FROM petugas WHERE username = '$username'");
            if (!mysqli_fetch_assoc($dataesult) && !mysqli_fetch_assoc($dataesult2)) {
                $password = md5($_POST['password']);
                $query = mysqli_query($koneksi, "INSERT INTO petugas VALUES (NULL,'" . $_POST['nama'] . "','" . $username . "','" . $password . "','" . $_POST['telp'] . "','" . $_POST['level'] . "')");
                if ($query) {
                    echo "<script>alert('Berhasil')</script>";
                    echo "<script>location='index.php?page=petugas';</script>";
                }
            } else {
                echo "<script>
                        alert('Username sudah terdaftar!');
                    </script>";
            }
        }
        ?>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>