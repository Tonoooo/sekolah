<?php
include 'koneksi.php';

$id_pc = $_POST['id'];

if (isset($_POST['devisi'])) {
	$id_devisi = $_POST['devisi'];
	$id_pengguna = $_POST['pengguna'];
} else{
	die('tidak');
}

$computer_name = $_POST['computer_name'];
$mainboard = $_POST['mainboard'];
$processor = $_POST['processor'];
$ram = $_POST['ram'];
$vga = $_POST['vga'];
$hdd = $_POST['hdd'];
$ssd = $_POST['ssd'];
$os = $_POST['os'];
$mac_address = $_POST['mac_address'];
$no_seri = $_POST['no_seri'];

mysqli_query($koneksi, "UPDATE data_pc SET computer_name='$computer_name',mainboard='$mainboard',processor='$processor',ram='$ram',vga='$vga',hdd='$hdd',ssd='$ssd',os='$os',mac_address='$mac_address',no_seri='$no_seri' WHERE id='$id_pc'");

mysqli_query($koneksi, "UPDATE data_inventaris SET id_data_devisi='$id_devisi',nama_pengguna_id='$id_pengguna' WHERE id_data_pc='$id_pc'");


header("location:pc.php");
 ?>