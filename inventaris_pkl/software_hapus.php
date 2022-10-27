<?php
include 'koneksi.php';
$id = $_GET["id"];

mysqli_query($koneksi, "DELETE FROM data_software WHERE id='$id'");
header("location:software.php")
?>