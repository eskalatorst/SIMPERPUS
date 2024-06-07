<?php
include 'simperpus/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk mencari pengguna dengan username yang sesuai
$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) == 1) {
    // Ambil data pengguna dari hasil query
    $user = mysqli_fetch_assoc($result);
    
    // Verifikasi password
    if (password_verify($password, $user['password'])) {
        // Password cocok, arahkan pengguna ke halaman index.php
        header("Location: index.php");
        exit();
    } else {
        // Password tidak cocok
        echo "Password salah. Silakan coba lagi.";
    }
} else {
    // Pengguna dengan username yang dimasukkan tidak ditemukan
    echo "Username tidak ditemukan atau password salah. Silakan coba lagi.";
}

mysqli_close($koneksi);
?>
