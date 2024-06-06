<?php

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

include "simperpus/koneksi.php";

$nama_anggota = $_POST['nama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$jenis_kelamin = $_POST['jenis_kelamin'];

if(@$_GET['id']){
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM anggota WHERE id_anggota = '$id'");

} elseif(@$_POST['id_anggota']){
    $id = $_POST['id_anggota']; 
   
    $query = "UPDATE anggota SET 
                nama_anggota = '$nama_anggota', 
                alamat = '$alamat', 
                email = '$email', 
                tlp = '$telepon',
                jenis_kelamin = '$jenis_kelamin' 
              WHERE id_anggota = '$id'";
              mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
} else {
    $query = "INSERT INTO anggota (nama_anggota, email, alamat, tlp, jenis_kelamin) VALUES ('$nama_anggota', '$email', '$alamat', '$telepon', '$jenis_kelamin')";
    mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
}
header('Location:anggota_read.php');

?>