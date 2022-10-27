<?php 

include 'koneksi.php';

$id = $_POST['id'];

$nama_software = $_POST['nama_software'];
$serial_number = $_POST['serial_number'];
$status_aktif = $_POST['status_aktif'];
$jumlah_lisensi = $_POST['jumlah_lisensi'];

mysqli_query($koneksi, "UPDATE data_software SET nama_software='$nama_software',serial_number='$serial_number',status_aktif='$status_aktif',jumlah_lisensi='$jumlah_lisensi' WHERE id='$id'");

header("location:software.php");
 ?>