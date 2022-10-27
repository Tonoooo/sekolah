<?php
include 'koneksi.php';
$id = $_GET["id"];

mysqli_query($koneksi, "DELETE FROM data_scanner WHERE id='$id'");
mysqli_query($koneksi, "UPDATE data_inventaris SET id_data_scanner='' WHERE id_data_scanner='$id'");

header("location:scanner.php")
?>