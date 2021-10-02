<h3 class="orange-text">Dashboard</h3>
<div class="row">
	<div class="col s4">
		<div style="background-color: #b26941;" class="card">
			<div class="card-content white-text">
				<?php
				$query = mysqli_query($koneksi, "SELECT * FROM pengajuan WHERE nidn='" . $_SESSION['data']['nidn'] . "'");
				$total_data = mysqli_num_rows($query);
				if ($total_data < 1) {
					$total_data = 0;
				}
				?>
				<span class="card-title">Total Proposal<b class="right"><?= $total_data; ?></b></span>
				<p></p>
			</div>
		</div>
	</div>
	<div class="col s4">
		<div class="card teal">
			<div class="card-content white-text">
				<?php
				$query = mysqli_query($koneksi, "SELECT * FROM pengajuan WHERE nidn='" . $_SESSION['data']['nidn'] . "' AND status='diterima'");
				$total_data = mysqli_num_rows($query);
				if ($total_data < 1) {
					$total_data = 0;
				} ?>
				<span class="card-title">Proposal Diterima<b class="right"><?= $total_data; ?></b></span>
				<p></p>
			</div>
		</div>
	</div>
</div>