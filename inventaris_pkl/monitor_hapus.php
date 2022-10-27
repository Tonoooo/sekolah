<?php
include 'koneksi.php';
$id = $_GET["id"];

mysqli_query($koneksi, "DELETE FROM data_monitor WHERE id='$id'");
mysqli_query($koneksi, "UPDATE data_inventaris SET id_data_monitor='' WHERE id_data_monitor='$id'");
header("location:monitor.php")
?>