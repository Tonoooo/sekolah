<?php 

include 'koneksi.php';

$id_devisi = $_POST['devisi'];
$id_pengguna = $_POST['pengguna'];

$merk = $_POST['merk'];
$tipe = $_POST['tipe'];
$no_seri = $_POST['no_seri'];

mysqli_query($koneksi, "INSERT INTO data_printer VALUES('','$merk','$tipe','$no_seri')");

$id_printer = mysqli_insert_id($koneksi);

$cek_id_user = mysqli_query($koneksi, "SELECT * FROM data_inventaris WHERE nama_pengguna_id='$id_pengguna'");
$cek_id_user_baris = mysqli_fetch_array($cek_id_user);
if (isset($cek_id_user_baris)) {
	mysqli_query($koneksi, "UPDATE data_inventaris SET id_data_printer='$id_printer' WHERE nama_pengguna_id='$id_pengguna'");
}
else {
	mysqli_query($koneksi, "INSERT INTO data_inventaris (id_data_devisi, jenis_barang, nama_pengguna_id, id_data_printer) VALUES('$id_devisi','printer','$id_pengguna', '$id_printer')");

}

header("location:printer.php");


 ?>