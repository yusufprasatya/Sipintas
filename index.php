<?php ob_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Aplikasi Pengajuan Proposal Penelitian</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<link href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	<!-- ICONS -->
	<link rel="shortcut icon" href="assets/img/logounitas.png">
	<style>
		@import url(https://fonts.googleapis.com/css?family=Lobster);
		@import url(https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css);

		#loginhome {
			padding: 50px;
			width: 40%;
			margin: 0 auto;
			margin-top: 10%;

		}

		@media (min-width:100px) and (max-width: 600px) {

			#loginhome {
				width: 100%;
			}
		}

		.card-alert button {
			background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
			border: medium none;
			color: #fff;
			font-size: 20px;
			position: absolute;
			right: 10px;
			top: 15px;
			color: inherit;
		}

		.card-alert a {
			color: inherit;
			font-weight: 500;
		}

		.card-alert a:hover {
			color: inherit;
			text-decoration: underline;
		}
	</style>
</head>

<body>
	<div class="pengumuman">
		<div class="card-alert card green lighten-5">
			<div class="card-content green-text center">
				<strong>Baca</strong> Pengumuman Terbaru <a href="pengumuman.php?tahun=2021">Disini.</a>
			</div>
			<button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
		</div>
	</div>
	<div class="container">
		<?php
		include 'config/koneksi.php';
		if (@$_GET['p'] == "") {
			include_once 'login.php';
		} elseif (@$_GET['p'] == "login") {
			include_once 'login.php';
		} elseif (@$_GET['p'] == "logout") {
			include_once 'logout.php';
		}
		?>

	</div>

	<script>
		$(document).ready(function() {
			$('.card-alert > button').on('click', function() {
				$(this).closest('div.card-alert').fadeOut('slow');
			})
		})
	</script>
</body>

</html>