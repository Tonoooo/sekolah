<?php

include 'koneksi.php';

if (!empty($_POST['devisi_baru'])) {
	$devisi_baru = $_POST['devisi_baru'];
}
else {
	die("Tidak boleh kosong!");
}

mysqli_query($koneksi, "insert into data_devisi (id, nama_devisi) values('','$devisi_baru')");

header("location:devisi.php")

?>