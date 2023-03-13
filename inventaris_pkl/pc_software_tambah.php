<?php 

include 'koneksi.php';

if (!empty($_POST['software'])) {
	$id_software = $_POST['software'];
	$id_pcnya = $_POST['id_pcnya'];
	
	mysqli_query($koneksi, "INSERT INTO software VALUES('','$id_pcnya','$id_software')");
	Header('Location:pc_detail.php?id='.$id_pcnya);
}

?>