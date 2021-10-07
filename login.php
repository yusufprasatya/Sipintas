<div id="loginhome" class="card loginpage">
	<div style="text-align: center;" class="logounitas"><img width="150px" src="assets/img/logounitas.png" alt=""></div>
	<form method="POST">
		<div class="input_field">
			<label for="username">Username</label>
			<input id="username" type="text" name="username" required>
		</div>
		<div class="input_field">
			<label for="password">Passowrd</label>
			<input id="password" type="password" name="password" required>
		</div>
		<!-- <input type="submit" name="login" value="Login" class="btn green" style="width: 100%;"> -->
		<button type="submit" name="login" value="Login" class="btn green" style="width: 100%;">Masuk</button>
	</form>
	<center><small>Atau Daftar <a style="font-weight :bold;" href="register.php">Disini</a></small></center>
</div>
<?php
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	// $password = mysqli_real_escape_string($koneksi, $_POST['password']);

	$sql = mysqli_query($koneksi, "SELECT * FROM dosen WHERE username='$username' AND password='$password' ");
	$cek = mysqli_num_rows($sql);
	$data = mysqli_fetch_assoc($sql);

	$sql2 = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username='$username' AND password='$password' ");
	$cek2 = mysqli_num_rows($sql2);
	$data2 = mysqli_fetch_assoc($sql2);

	if ($cek > 0) {
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['data'] = $data;
		$_SESSION['level'] = 'dosen';
		header('location:pages/dosen/');
	} elseif ($cek2 > 0) {
		if ($data2['level'] == "admin") {
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['data'] = $data2;
			header('location:pages/admin/');
		} elseif ($data2['level'] == "reviewer") {
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['data'] = $data2;
			header('location:pages/reviewer/');
		}
	} else {
		echo "<script>alert('username atau password salah')</script>";
	}
}
?>