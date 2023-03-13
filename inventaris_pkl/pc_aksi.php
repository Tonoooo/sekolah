<?php 

include 'koneksi.php';

$id_devisi = $_POST['devisi'];
$id_pengguna = $_POST['pengguna'];

$nama_pc = $_POST['computer_name'];
$mainboard = $_POST['mainboard'];
$processor = $_POST['processor'];
$ram = $_POST['ram'];
$vga = $_POST['vga'];
$hdd = $_POST['hdd'];
$ssd = $_POST['ssd'];
$os = $_POST['os'];
$mac_address = $_POST['mac_address'];
$no_seri = $_POST['no_seri'];

mysqli_query($koneksi, "INSERT INTO data_pc VALUES('','$nama_pc','$mainboard','$processor','$ram','$vga','$hdd','$ssd','$os','$mac_address','$no_seri')");

$id_pc = mysqli_insert_id($koneksi);


$cek_id_user = mysqli_query($koneksi, "SELECT * FROM data_inventaris WHERE nama_pengguna_id='$id_pengguna'");
$cek_id_user_baris = mysqli_fetch_array($cek_id_user);
if (isset($cek_id_user_baris)) {
	mysqli_query($koneksi, "UPDATE data_inventaris SET id_data_pc='$id_pc' WHERE nama_pengguna_id='$id_pengguna'");
}
else {
	mysqli_query($koneksi, "INSERT INTO data_inventaris (id_data_devisi, jenis_barang, nama_pengguna_id, id_data_pc) VALUES('$id_devisi','pc','$id_pengguna', '$id_pc')");
}


header("location:pc.php");


 ?>