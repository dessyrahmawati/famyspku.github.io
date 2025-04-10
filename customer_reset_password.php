<?php
include 'config.php'; // Koneksi ke database

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Memeriksa token di database
    $query = "SELECT * FROM password_resets WHERE token = '$token' AND expiry_time > " . time();
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Token valid, tampilkan form untuk mengatur ulang password
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $newPassword = $_POST['password'];
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

            // Ambil email pengguna dari token
            $row = mysqli_fetch_assoc($result);
            $email = $row['email'];

            // Update password di database
            $query = "UPDATE users SET password = '$hashedPassword' WHERE email = '$email'";
            mysqli_query($conn, $query);

            // Hapus token dari database setelah digunakan
            $query = "DELETE FROM password_resets WHERE token = '$token'";
            mysqli_query($conn, $query);

            echo "Password Anda telah diubah.";
        }
    } else {
        echo "Token tidak valid atau sudah kedaluwarsa.";
    }
}
?>

<form action="customer_reset_password.php?token=<?php echo $_GET['token']; ?>" method="post">
    <label for="password">Password Baru:</label>
    <input type="password" name="password" required>
    <button type="submit">Reset Password</button>
</form>