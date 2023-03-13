<?php
include 'koneksi.php';
$id = $_GET["id"];

mysqli_query($koneksi, "DELETE FROM db_hdd_eks WHERE id='$id'");
mysqli_query($koneksi, "UPDATE data_inventaris SET id_data_hdd_eks='' WHERE id_data_hdd_eks='$id'");

header("location:hdd.php")
?>