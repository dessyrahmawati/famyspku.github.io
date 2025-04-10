<?php
// Menghubungkan dengan koneksi
include 'koneksi.php';

// Menangkap email dari form
$email = mysqli_real_escape_string($koneksi, $_POST['email']);

// Cek apakah email terdaftar
$cek_email = mysqli_query($koneksi, "SELECT * FROM customer WHERE customer_email='$email'");
if (mysqli_num_rows($cek_email) > 0) {
    // Jika email ditemukan
    $data = mysqli_fetch_assoc($cek_email);
    $token = md5(uniqid(rand(), true)); // Membuat token unik

    // Simpan token ke database
    mysqli_query($koneksi, "UPDATE customer SET reset_token='$token', reset_expired=DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE customer_email='$email'");

    // Redirect ke halaman ubah password dengan token
    header("location:reset_password.php?token=$token");
} else {
    // Jika email tidak ditemukan
    header("location:customer_forgot_password.php?alert=email_not_found");
}
?>
