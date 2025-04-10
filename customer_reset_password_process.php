<?php
// Pastikan koneksi ke database sudah benar
include 'config.php'; // Include file konfigurasi koneksi database

// Check if email is provided
if (isset($_POST['email'])) {
    // Ambil email dan sanitasi
    $email = mysqli_real_escape_string($db, $_POST['email']);

    // Verifikasi apakah email ada di database
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Generate a unique reset link (gunakan token yang aman)
        $token = bin2hex(random_bytes(16));
        $reset_link = "http://yourwebsite.com/reset_password.php?token=$token";

        // Simpan token di database bersama dengan waktu kadaluwarsa
        $expiration = time() + 3600; // Token berlaku selama 1 jam
        $query = "UPDATE users SET reset_token = ?, token_expiration = ? WHERE email = ?";
        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, 'sis', $token, $expiration, $email);
        mysqli_stmt_execute($stmt);

        // Kirim link reset password ke email pengguna
        $subject = "Password Reset Request";
        $message = "Klik link berikut untuk mereset password Anda: $reset_link";
        $headers = "From: no-reply@yourwebsite.com";

        if (mail($email, $subject, $message, $headers)) {
            echo "<div class='alert alert-success'>A password reset link has been sent to your email.</div>";
        } else {
            echo "<div class='alert alert-danger'>Failed to send email. Please try again later.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Email not found.</div>";
    }

    // Menutup statement dan koneksi database
    mysqli_stmt_close($stmt);
    mysqli_close($db);
}
