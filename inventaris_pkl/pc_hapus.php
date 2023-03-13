<?php
include 'koneksi.php';
$id = $_GET["id"];

mysqli_query($koneksi, "DELETE FROM data_pc WHERE id='$id'");
mysqli_query($koneksi, "DELETE FROM software WHERE id_pc='$id'");
mysqli_query($koneksi, "UPDATE data_inventaris SET id_data_pc='' WHERE id_data_pc='$id'");

header("location:pc.php")
?>