<?php
if (isset($_POST['simpan'])) {
    $nidn = htmlspecialchars($_POST["nidn"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $telp = htmlspecialchars($_POST["telp"]);
    $username = htmlspecialchars($_POST["username"]);
    $password = md5($_POST['password']);

    $result = mysqli_query($koneksi, "SELECT username FROM dosen WHERE username = '$username'");
    $result2 = mysqli_query($koneksi, "SELECT username FROM petugas WHERE username = '$username'");
    if (mysqli_fetch_assoc($result) || mysqli_fetch_assoc($result2)) {
        echo "<script>
                alert('Username sudah terdaftar!');
            </script>";
        echo "<script>window.location='register.php';</script>";
    } else {
        $password = md5($_POST['password']);
        $register = mysqli_query($koneksi, "INSERT INTO dosen (nidn,nama,username,password,telp) VALUES ('$nidn', '$nama', '$username', '$password','$telp')");
        if ($register) {
            echo "<script>alert('Daftar Berhasil')</script>";
            echo "<script>location='index.php'</script>";
        }
    }
}
?>

<div id="loginhome" class="card">
    <div style="text-align: center;" class="logounitas"><img width="150px" src="assets/img/logounitas.png" alt=""></div>
    <form method="POST">
        <div class="input_field">
            <label for="username">NIDN</label>
            <input id="username" type="number" name="nidn" required>
        </div>
        <div class="input_field">
            <label for="username">Nama</label>
            <input id="username" type="text" name="nama" required>
        </div>
        <div class="input_field">
            <label for="username">No Telepon</label>
            <input id="username" type="number" name="telp" required>
        </div>
        <div class="input_field">
            <label for="username">Username</label>
            <input id="username" type="text" name="username" required>
        </div>
        <div class="input_field">
            <label for="username">Password</label>
            <input id="username" type="password" name="password" required>
        </div>
        <!-- <input type="submit" name="login" value="Login" class="btn green" style="width: 100%;"> -->
        <button type="submit" name="simpan" value="simpan" class="btn green" style="width: 100%;">Daftar</button>
    </form>
    <center><small>Sudah punya Akun? Login <a style="font-weight :bold;" href="index.php">Disini</a></small></center>
</div>