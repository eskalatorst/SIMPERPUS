<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota</title>
    <link rel="stylesheet" href="bootstrap/assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
<?php include "./nav.php"; ?>

<div class="container">
    <h1 class="my-4">Data Anggota</h1>
    <?php
    include "simperpus/koneksi.php";
    
    // Ambil data anggota
    $anggota = mysqli_query($koneksi, "SELECT * FROM anggota");
    
    // Cek apakah ada data anggota
    if (mysqli_num_rows($anggota) > 0) {
        echo '<a class="btn btn-info mb-3" href="anggota-form.php">Tambah Data</a>';

        echo '<table class="table table-hover">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">No.</th>';
        echo '<th scope="col">Nama</th>';
        echo '<th scope="col">Alamat</th>';
        echo '<th scope="col">Email</th>';
        echo '<th scope="col">Telp</th>';
        echo '<th scope="col">Jenis Kelamin</th>';
        echo '<th scope="col">Action</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Tampilkan data anggota
        foreach ($anggota as $key => $value) {
            $no = $key + 1;
            echo '<tr>';
            echo '<td>' . $no . '</td>';
            echo '<td>' . htmlspecialchars($value['nama_anggota']) . '</td>';
            echo '<td>' . htmlspecialchars($value['alamat']) . '</td>';
            echo '<td>' . htmlspecialchars($value['email']) . '</td>';
            echo '<td>' . htmlspecialchars($value['tlp']) . '</td>';
            echo '<td>' . htmlspecialchars($value['jenis_kelamin']) . '</td>';
            echo '<td>';
            echo '<div class="btn-group">';
            echo '<a href="anggota_view.php?id=' . $value['id_anggota'] . '" class="btn btn-primary m-1">View</a>';
            echo '<a href="anggota-form.php?id=' . $value['id_anggota'] . '" class="btn btn-warning m-1">Edit</a>';
            echo '<a href="anggota_act.php?id=' . $value['id_anggota'] . '" class="btn btn-danger m-1" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')">Delete</a>';
            echo '</div>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<div class="alert alert-info">Tidak ada data anggota.</div>';
    }
    ?>
</div>

<script src="bootstrap/assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
