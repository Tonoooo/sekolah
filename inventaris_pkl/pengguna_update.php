<?php 

include 'koneksi.php';

$nama_baru = $_POST['nama'];
$id = $_POST['id'];


mysqli_query($koneksi, "UPDATE data_pengguna SET 
	nama='$nama_baru'
	where id='$id'");


header("location:pengguna.php");
?>