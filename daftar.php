<?php include 'header.php'; ?>

<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Daftar Customer</li>
		</ul>
	</div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
<style>
	body {
    background-color: #f5f5dc; /* Warna cream */
}
</style>
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="order-summary clearfix">
					<div class="section-title">
						<h3 class="title">Pendaftaran Customer Baru</h3>
					</div>

					<?php
					if (isset($_GET['alert'])) {
						if ($_GET['alert'] == "duplikat") {
							echo "<div class='alert alert-danger text-center'>Maaf email ini sudah digunakan, silahkan gunakan email yang lain.</div>";
						}
					}
					?>

					<div class="row">
						<div class="col-lg-6 col-lg-offset-3">
							<form action="daftar_act.php" method="post" onsubmit="return validateForm()">
								<div class="form-group">
									<label for="">Nama Lengkap</label>
									<input type="text" class="input" required="required" name="nama" placeholder="Masukkan nama lengkap ..">
								</div>

								<div class="form-group">
									<label for="">Email</label>
									<input type="email" class="input" required="required" name="email" placeholder="Masukkan email ..">
								</div>

								<div class="form-group">
									<label for="">Nomor HP / Whatsapp</label>
									<input type="number" class="input" required="required" name="hp" placeholder="Masukkan nomor HP/Whatsapp ..">
								</div>

								<div class="form-group">
									<label for="">Alamat Lengkap</label>
									<input type="text" class="input" required="required" name="alamat" placeholder="Masukkan alamat lengkap ..">
								</div>

								<div class="form-group">
									<label for="">Password</label>
									<input type="password" id="password" class="input" required="required" name="password" placeholder="Masukkan password ..">
									<small class="text-muted">Password ini digunakan untuk login ke akun anda.</small>
								</div>

								<div class="form-group">
									<label for="">Konfirmasi Password</label>
									<input type="password" id="confirm_password" class="input" required="required" placeholder="Masukkan ulang password ..">
									<small class="text-danger" id="password_error" style="display:none;">Password tidak cocok!</small>
								</div>

								<div class="form-group">
									<input type="submit" class="primary-btn btn-block" value="Daftar">
								</div>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

<?php include 'footer.php'; ?>

<script>
	// Validasi password di sisi klien
	function validateForm() {
		var password = document.getElementById("password").value;
		var confirmPassword = document.getElementById("confirm_password").value;

		if (password !== confirmPassword) {
			// Tampilkan pesan error
			document.getElementById("password_error").style.display = "block";
			return false; // Hentikan form submission
		} else {
			document.getElementById("password_error").style.display = "none";
			return true; // Lanjutkan form submission
		}
	}
</script>