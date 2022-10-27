<?php 

include 'koneksi.php';

$id = $_POST['id'];

if (isset($_POST['devisi'])) {
	$id_devisi = $_POST['devisi'];
	$id_pengguna = $_POST['pengguna'];
} else{
	die('tidak');
}

$merk = $_POST['merk'];
$keterangan= $_POST['keterangan'];
$no_seri= $_POST['no_seri'];

mysqli_query($koneksi, "UPDATE data_monitor SET merk='$merk',keterangan='$keterangan',no_seri='$no_seri' WHERE id='$id'");
mysqli_query($koneksi, "UPDATE data_inventaris SET id_data_devisi='$id_devisi',nama_pengguna_id='$id_pengguna' WHERE id_data_monitor='$id'");

header("location:monitor.php");
 ?>