<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
<?php
    include "./nav.php";
    ?>
   
    <div class="container">
   
    <h1>Data Anggota</h1>
    <?php
    include "simperpus/koneksi.php";
    $anggota = mysqli_query($koneksi, "SELECT * FROM anggota");
    ?>
     <a class="btn btn-info text-start m-3" href="anggota-form.php">Tambah Data</a>

<table class="table table-hover">
  <thead>
    <!-- Judul tabel anggota -->
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">Email</th>
      <th scope="col">Telp</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Menu</th>

    </tr>
  </thead>
  <tbody>
    <!-- Data Anggota -->
    <?php
    foreach ($anggota as $key => $value) {
      # code...
      $no = $key + 1;
    ?>
    <tr>
      <td><?= $no ?></td>
      <td><?= $value['nama_anggota']?></td>
      <td><?= $value['alamat']?></td>
      <td><?= $value['email']?></td>
      <td><?= $value['tlp']?></td>
      <td><?= $value['jenis_kelamin']?></td>
      <td>
        <div class="row">
        <div class="btn-group">
          <a href="anggota-form.php?id=<?= $value['id_anggota']?>" class="btn btn-warning">Edit</a>
          <a href="anggota_act.php?id=<?= $value['id_anggota']?>" class="btn btn-danger">Delete</a>
        </div>
        </div>
      </td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
<script src="bootstrap/assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
