<?php include 'header.php'; ?>

<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Lupa Password</li>
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
                        <h3 class="title">Lupa Password</h3>
                    </div>

                    <?php
                    if (isset($_GET['alert'])) {
                        if ($_GET['alert'] == "email_not_found") {
                            echo "<div class='alert alert-danger text-center'>Email tidak ditemukan, silakan cek kembali.</div>";
                        } elseif ($_GET['alert'] == "email_sent") {
                            echo "<div class='alert alert-success text-center'>Email reset password telah dikirim. Silakan periksa inbox Anda.</div>";
                        }
                    }
                    ?>

                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">

                            <form action="forgot_password_act.php" method="post">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="input" required="required" name="email" placeholder="Masukkan email terdaftar Anda">
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="primary-btn btn-block" value="Kirim Email Reset">
                                </div>

                                <div class="text-center">
                                    <a href="masuk.php">Kembali ke Halaman Login</a>
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
