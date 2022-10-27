<?php
include 'koneksi.php';
$id = $_GET["id"];

mysqli_query($koneksi, "DELETE FROM data_devisi WHERE id='$id'");
header("location:devisi.php")
?>