<?php 
include 'koneksi.php';

$id_laptop = $_POST['id'];

if (isset($_POST['devisi'])) {
	$id_devisi = $_POST['devisi'];
	$id_pengguna = $_POST['pengguna'];
} else{
	die('tidak');
}


$merk = $_POST['merk'];
$tipe = $_POST['tipe'];
$processor = $_POST['processor'];
$ram = $_POST['ram'];
$ssd = $_POST['ssd'];
$hdd = $_POST['hdd'];
$os = $_POST['os'];
$no_seri = $_POST['no_seri'];
$akun_email_microsoft = $_POST['akun_email_microsoft'];
$password_email_microsoft = $_POST['password_email_microsoft'];

mysqli_query($koneksi, "UPDATE data_laptop SET merk='$merk',tipe='$tipe', processor='$processor', ram='$ram', ssd='$ssd', hdd='$hdd', os='$os', no_seri='$no_seri', akun_email_microsoft='$akun_email_microsoft', password_email_microsoft='$password_email_microsoft' WHERE id='$id_laptop'");

mysqli_query($koneksi, "UPDATE data_inventaris SET id_data_devisi='$id_devisi',nama_pengguna_id='$id_pengguna' WHERE id_data_laptop='$id_laptop'");

header("location:laptop.php")

// echo($id_laptop);
// echo($merk);
// echo($tipe);
// echo $processor;
// echo($ram);
// echo($ssd);
// echo($password_email_microsoft);

 ?>