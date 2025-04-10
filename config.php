<?php
$servername = "localhost";
$username = "root";
$password = "";  // Biasanya XAMPP tidak menggunakan password untuk root
$dbname = "project_tokoonline";  // Gantilah dengan nama database yang benar

// Koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Periksa apakah koneksi berhasil
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
