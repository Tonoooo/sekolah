<?php 

include 'koneksi.php';

$id_devisi = $_POST['devisi'];
$id_pengguna = $_POST['pengguna'];

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

mysqli_query($koneksi, "INSERT INTO data_laptop VALUES('','$merk','$tipe','$processor','$ram','$ssd','$hdd','$os','$no_seri','$akun_email_microsoft','$password_email_microsoft')");

$id_laptop = mysqli_insert_id($koneksi);

$cek_id_user = mysqli_query($koneksi, "SELECT * FROM data_inventaris WHERE nama_pengguna_id='$id_pengguna'");
$cek_id_user_baris = mysqli_fetch_array($cek_id_user);
if (isset($cek_id_user_baris)) {
	mysqli_query($koneksi, "UPDATE data_inventaris SET id_data_laptop='$id_laptop' WHERE nama_pengguna_id='$id_pengguna'");
}
else {
	mysqli_query($koneksi, "INSERT INTO data_inventaris (id_data_devisi, jenis_barang, nama_pengguna_id, id_data_laptop) VALUES('$id_devisi','laptop','$id_pengguna', '$id_laptop')");

}

header("location:laptop.php")
 ?>