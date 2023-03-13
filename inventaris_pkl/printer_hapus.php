<?php
include 'koneksi.php';
$id = $_GET["id"];

mysqli_query($koneksi, "DELETE FROM data_printer WHERE id='$id'");

mysqli_query($koneksi, "UPDATE data_inventaris SET id_data_printer='' WHERE id_data_printer='$id'");

header("location:printer.php")
?>