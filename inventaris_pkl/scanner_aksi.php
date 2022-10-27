<?php 

include 'koneksi.php';

$id_devisi = $_POST['devisi'];
$id_pengguna = $_POST['pengguna'];

$merk = $_POST['merk'];
$tipe = $_POST['tipe'];
$no_seri = $_POST['no_seri'];

mysqli_query($koneksi, "INSERT INTO data_scanner VALUES('','$merk','$tipe','$no_seri')");

$id_scanner = mysqli_insert_id($koneksi);

$cek_id_user = mysqli_query($koneksi, "SELECT * FROM data_inventaris WHERE nama_pengguna_id='$id_pengguna'");
$cek_id_user_baris = mysqli_fetch_array($cek_id_user);
if (isset($cek_id_user_baris)) {
	mysqli_query($koneksi, "UPDATE data_inventaris SET id_data_scanner='$id_scanner' WHERE nama_pengguna_id='$id_pengguna'");
}
else {
	mysqli_query($koneksi, "INSERT INTO data_inventaris (id_data_devisi, jenis_barang, nama_pengguna_id, id_data_scanner) VALUES('$id_devisi','scanner','$id_pengguna', '$id_scanner')");

}

header("location:scanner.php");


 ?>