<?php 
include 'koneksi.php';
$nama  = $_POST['nama'];
$email = $_POST['email'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];
$password = md5($_POST['password']);
$confirm_password = md5($_POST['confirm_password']);

mysqli_query($koneksi, "INSERT INTO customer (customer_nama, customer_email, customer_hp, customer_alamat, customer_password) VALUES ('$nama', '$email', '$hp', '$alamat', '$password')");


// Cek apakah password dan konfirmasi password sama
if ($password !== $confirm_password) {
	header("location:masuk.php");
	exit(); // Hentikan eksekusi lebih lanjut
}

// Enkripsi password sebelum menyimpannya
$password_hashed = md5($password);



// Simpan data ke database
mysqli_query($koneksi, "INSERT INTO customer (customer_nama, customer_email, customer_hp, customer_alamat, customer_password) VALUES ('$nama', '$email', '$hp', '$alamat', '$password')");

// Redirect ke halaman login dengan pesan sukses
header("location:masuk.php?alert=terdaftar");
?>
