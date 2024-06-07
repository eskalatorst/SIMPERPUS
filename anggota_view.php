<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Anggota</title>
    <link rel="stylesheet" href="bootstrap/assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
<?php include "./nav.php"; ?>

<div class="container">
    <h1 class="my-4">Detail Anggota</h1>
    <?php
    include "simperpus/koneksi.php";
    
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $result = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota = $id");

        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            echo '<table class="table table-bordered">';
            
            echo '<tr><th>Nama</th><td>' . htmlspecialchars($data['nama_anggota']) . '</td></tr>';
            echo '<tr><th>Alamat</th><td>' . htmlspecialchars($data['alamat']) . '</td></tr>';
            echo '<tr><th>Email</th><td>' . htmlspecialchars($data['email']) . '</td></tr>';
            echo '<tr><th>Telepon</th><td>' . htmlspecialchars($data['tlp']) . '</td></tr>';
            echo '<tr><th>Jenis Kelamin</th><td>' . htmlspecialchars($data['jenis_kelamin']) . '</td></tr>';
            echo '</table>';
        } else {
            echo '<div class="alert alert-warning">Data anggota tidak ditemukan.</div>';
        }
    } else {
        echo '<div class="alert alert-danger">ID tidak valid.</div>';
    }
    ?>
    <a href="anggota_read.php" class="btn btn-secondary mt-3">Kembali ke Daftar Anggota</a>
</div>

<script src="bootstrap/assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
