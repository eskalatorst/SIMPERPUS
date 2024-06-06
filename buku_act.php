<?php

echo '<pre>';
print_r($_POST);
echo '</pre>';

include "simperpus/koneksi.php";

$judul_buku = $_POST['judul'] ?? null;
$tahun = $_POST['tahun'] ?? null;
$pengarang = $_POST['pengarang'] ?? null;
$penerbit = $_POST['penerbit'] ?? null;

if (@$_GET['id']) {
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku = '$id'") 
    or die (mysqli_error($koneksi));
    header('Location: buku_read.php');
} elseif (@$_POST['id_buku']) {
    $id = $_POST['id_buku'];
    $query = "UPDATE buku SET
        judul_buku = '$judul_buku',
        tahun = '$tahun',
        pengarang = '$pengarang',
        penerbit = '$penerbit'
        WHERE id_buku = '$id'
    ";
    mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
    header('Location: buku_read.php');
} else {
    $query = "INSERT INTO buku (judul_buku, tahun, pengarang, penerbit) VALUES ('$judul_buku', '$tahun', '$pengarang', '$penerbit')";
    mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
    header('Location: buku_read.php');
}

?>