<?php
include 'simperpus/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Cek apakah password dan konfirmasi password cocok
if ($password !== $confirm_password) {
    echo "Password dan konfirmasi password tidak cocok.";
    exit;
}

// Masukkan data ke dalam tabel pengguna
$query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    // Registrasi berhasil, arahkan pengguna ke halaman login
    header("Location: login.php");
    exit();
} else {
    echo "Error: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
