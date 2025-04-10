<?php include 'header.php'; ?>
<?php
// Menghubungkan dengan koneksi
include 'koneksi.php';

// Validasi token
$token = mysqli_real_escape_string($koneksi, $_GET['token']);
$cek_token = mysqli_query($koneksi, "SELECT * FROM customer WHERE reset_token='$token' AND reset_expired > NOW()");

if (mysqli_num_rows($cek_token) == 0) {
    echo "<div class='alert alert-danger text-center'>Token tidak valid atau telah kedaluwarsa.</div>";
    exit();
}
?>

<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Reset Password</li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="order-summary clearfix">
                    <div class="section-title">
                        <h3 class="title">Reset Password</h3>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">
                            <form action="reset_password_act.php" method="post">
                                <input type="hidden" name="token" value="<?php echo $token; ?>">

                                <div class="form-group">
                                    <label for="">Password Baru</label>
                                    <input type="password" class="input" required="required" name="password" placeholder="Masukkan password baru">
                                </div>

                                <div class="form-group">
                                    <label for="">Konfirmasi Password</label>
                                    <input type="password" class="input" required="required" name="confirm_password" placeholder="Konfirmasi password baru">
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="primary-btn btn-block" value="Reset Password">
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
