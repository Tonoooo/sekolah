<?php
include 'koneksi.php';
$id_laptop = $_GET["id"];

mysqli_query($koneksi, "DELETE FROM data_laptop WHERE id='$id_laptop'");

mysqli_query($koneksi, "UPDATE data_inventaris SET id_data_laptop='' WHERE id_data_laptop='$id_laptop'");

// mysqli_query($koneksi, "DELETE FROM data_inventaris WHERE id_data_laptop='$id_laptop'");

header("location:laptop.php")

?>