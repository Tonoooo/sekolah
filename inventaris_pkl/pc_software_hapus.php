<?php 
include 'koneksi.php';
$id_software = $_GET['id'];

$id_pc = mysqli_query($koneksi, "SELECT id_pc FROM software WHERE id='$id_software'");
$cek_id_pc = mysqli_fetch_array($id_pc);

// echo($cek_id_pc[0]);
mysqli_query($koneksi, "DELETE FROM software WHERE id='$id_software'");

header('Location:pc_detail.php?id='.$cek_id_pc[0]);

 ?>