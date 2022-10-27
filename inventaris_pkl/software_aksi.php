<?php 

include 'koneksi.php';

$nama_software = $_POST['nama_software'];
$serial_number = $_POST['serial_number'];
$status_aktif = $_POST['status_aktif'];
$jumlah_lisensi = $_POST['jumlah_lisensi'];

mysqli_query($koneksi, "INSERT INTO data_software VALUES('','$nama_software','$serial_number','$status_aktif','$jumlah_lisensi')");

header("location:software.php");


 ?>