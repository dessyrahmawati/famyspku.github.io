<?php
include 'koneksi.php';

// Menangkap data dari form
$token = mysqli_real_escape_string($koneksi, $_POST['token']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);
$confirm_password = mysqli_real_escape_string($koneksi, $_POST['confirm_password']);

// Validasi token
$cek_token = mysqli_query($koneksi, "SELECT * FROM customer WHERE reset_token='$token' AND reset_expired > NOW()");
if (mysqli_num_rows($cek_token) == 0) {
    header("location:customer_forgot_password.php?alert=invalid_token");
    exit();
}

// Validasi password
if ($password !== $confirm_password) {
    header("location:reset_password.php?token=$token&alert=password_mismatch");
    exit();
}

// Enkripsi password dan perbarui
$password_hashed = md5($password);
mysqli_query($koneksi, "UPDATE customer SET customer_password='$password_hashed', reset_token=NULL, reset_expired=NULL WHERE reset_token='$token'");

// Redirect ke halaman login
header("location:masuk.php?alert=password_reset");
?>
