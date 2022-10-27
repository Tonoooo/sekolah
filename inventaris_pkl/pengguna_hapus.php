<?php
include 'koneksi.php';
$id = $_GET["id"];

mysqli_query($koneksi, "DELETE FROM data_pengguna WHERE id='$id'");
header("location:pengguna.php")
?>