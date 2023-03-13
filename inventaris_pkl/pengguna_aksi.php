<?php

include 'koneksi.php';

if (!empty($_POST['pengguna_baru'])) {
	$pengguna_baru = $_POST['pengguna_baru'];
}
else {
	die("Tidak boleh kosong!");
}

mysqli_query($koneksi, "insert into data_pengguna (id, nama) values('','$pengguna_baru')");


header("location:pengguna.php")

?>