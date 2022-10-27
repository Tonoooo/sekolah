<?php 

include 'koneksi.php';

$id_devisi = $_POST['devisi'];
$id_pengguna = $_POST['pengguna'];

$merk = $_POST['merk'];
$kapasitas = $_POST['kapasitas'];
$no_seri = $_POST['no_seri'];

mysqli_query($koneksi, "INSERT INTO db_hdd_eks VALUES('','$merk','$kapasitas','$no_seri')");

$id_hdd = mysqli_insert_id($koneksi);

$cek_id_user = mysqli_query($koneksi, "SELECT * FROM data_inventaris WHERE nama_pengguna_id='$id_pengguna'");
$cek_id_user_baris = mysqli_fetch_array($cek_id_user);
if (isset($cek_id_user_baris)) {
	mysqli_query($koneksi, "UPDATE data_inventaris SET id_data_hdd_eks='$id_hdd' WHERE nama_pengguna_id='$id_pengguna'");
}
else {
	mysqli_query($koneksi, "INSERT INTO data_inventaris (id_data_devisi, jenis_barang, nama_pengguna_id, id_data_hdd_eks) VALUES('$id_devisi','hdd','$id_pengguna', '$id_hdd')");

}


header("location:hdd.php");


 ?>